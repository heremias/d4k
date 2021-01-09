<?php

namespace Drupal\aws_cloudwatchlogs\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\aws_cloudwatchlogs\Services\Download;
use Drupal\aws_cloudwatchlogs\Services\Utility;
use Drupal\aws_cloudwatchlogs\Services\FilterLogEvents;
use Drupal\aws_cloudwatchlogs\Services\DescribeLogGroups;
use Drupal\aws_cloudwatchlogs\Services\DescribeLogStreams;
use Drupal\Core\Messenger\MessengerInterface;

/**
 * Form for searching for specific events.
 */
class FilterLogForm extends FormBase {

  /**
   * Default Number of records to feth from AWS Cloudwatch logs.
   */
  protected const DEFAULT_LIMIT = 10;

  /**
   * Stores the object of AWS Cloudwatch logs.
   *
   * @var object
   */
  protected $logEvents;

  /**
   * Messanger for showing drupal status messages.
   *
   * @var object
   */
  protected $messanger;

  /**
   * Object for service to download logs.
   *
   * @var object
   */
  protected $download;

  /**
   * Object for service to Describe log groups.
   *
   * @var object
   */
  protected $logGroups;

  /**
   * Object for service to Describe log streams.
   *
   * @var object
   */
  protected $logStreams;

  /**
   * Object for service defining generic utilities.
   *
   * @var object
   */
  protected $utility;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'aws_cloudwatchlogs_filter_log_form';
  }

  /**
   * {@inheritdoc}
   */
  public function __construct(
    FilterLogEvents $filterLogEvents,
    Download $download,
    MessengerInterface $messanger,
    DescribeLogGroups $logGroups,
    DescribeLogStreams $logStreams,
    Utility $utility
  ) {
    $this->logEvents = $filterLogEvents;
    $this->download = $download;
    $this->messanger = $messanger;
    $this->logGroups = $logGroups;
    $this->logStreams = $logStreams;
    $this->utility = $utility;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('aws_cloudwatchlogs.filter_log_events'),
      $container->get('aws_cloudwatchlogs.download'),
      $container->get('messenger'),
      $container->get('aws_cloudwatchlogs.describe_log_groups'),
      $container->get('aws_cloudwatchlogs.describe_log_streams'),
      $container->get('aws_cloudwatchlogs.utility')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $client = $this->logEvents->getClient();
    $logGroupOptions = $logStreamsOptions = [];
    // Use this only when getValues is empty and form is rebuild even then.
    // This is when download feature when used multiple times without fresh.
    // As form response is set for download in first call.
    $userInput = $form_state->getUserInput();
    $selectedLogGroup = NULL;

    // Options for log groups.
    $logGroupsList = $this->logGroups->getResult($client);
    if ($logGroupsList) {
      $logGroupOptions = $this->logGroups->getLogGroupNameOnly($logGroupsList);
    }

    // It varifies, if any value is submitted through form submit and rebuilt.
    // If rebuild getValue will return the data.
    // If form setResponse() is used for download. Then getValue will be empty
    // and getUserImput will be used.
    if (
      ($selectedLogGroup = $form_state->getValue('log_group')) ||
      (
        (count($userInput) > 0) &&
        ($selectedLogGroup = $userInput['log_group'])
      )
    ) {
      // Fetch matching log streams.
      $client = $this->logStreams->getClient();
      $logStreams = $this->logStreams->getResult($client, $selectedLogGroup);
      $logStreamsOptions = $this->logStreams->getNamesOnly($logStreams);
    }

    $form['log_group'] = [
      '#type' => 'select',
      '#title' => $this->t('Log Group Name'),
      '#description' => $this->t('The name of the log group.'),
      '#options' => $logGroupOptions,
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::getMatchingLogStreams',
        'disable-refocus' => FALSE,
        'event' => 'change',
        'wrapper' => 'log-streams-outer-wrapper',
        'progress' => [
          'type' => 'throbber',
          'message' => $this->t('Updating Log Streams...'),
        ],
      ],
      '#weight' => 0,
    ];
    $form['log_streams_fieldset'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Log Streams'),
    ];
    $patternInfo = 'https://docs.aws.amazon.com/AmazonCloudWatch/latest/logs/FilterAndPatternSyntax.html';
    $form['log_streams_fieldset']['log_stream_pattern'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Log Stream Name Prefix'),
      '#description' => $this->t('Filters the results to include only
        events from log streams that have names starting with this prefix.
        See <a href=":moreInfo">Filter and Pattern Syntax</a>.
        ', [':moreInfo' => $patternInfo]),
      '#weight' => 1,
    ];
    $form['log_streams_fieldset']['log_streams'] = [
      '#type' => 'select',
      '#title' => $this->t('Log Stream Name'),
      '#description' => $this->t('The name of the log stream under respective log group.'),
      '#options' => $logStreamsOptions,
      '#prefix' => '<div id="log-streams-outer-wrapper">',
      '#suffix' => '</div>',
      '#states' => [
        'invisible' => [
          ':input[name="log_stream_pattern"]' => ['filled' => TRUE],
        ],
      ],
      '#multiple' => TRUE,
      '#weight' => 1,
    ];
    $form['filter_pattern'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Filter Pattern'),
      '#description' => $this->t('The filter pattern to use. For more information,
       see <a href=":moreInfo">Filter and Pattern Syntax</a>.', [':moreInfo' => $patternInfo]),
      '#weight' => 2,
    ];
    $form['start_time'] = [
      '#type' => 'date',
      '#title' => $this->t('Start time of the logs'),
      '#description' => $this->t('The time from which you have to search/generate the logs for.'),
      '#weight' => 2,
    ];
    $form['end_time'] = [
      '#type' => 'date',
      '#title' => $this->t('End time of the logs'),
      '#description' => $this->t('The time up to which you have to search/generate the logs for.'),
      '#weight' => 3,
    ];
    $form['limit'] = [
      '#type' => 'number',
      '#title' => $this->t('Limit'),
      '#description' => $this->t('Number of logs to fetch, default number of logs are 20.'),
      '#weight' => 4,
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['#weight'] = 5;
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Generate Log'),
      '#button_type' => 'primary',
    ];
    $form['actions']['download'] = [
      '#type' => 'submit',
      '#value' => $this->t('Download Logs'),
      '#button_type' => 'primary',
      '#submit' => ['::downloadLogsSubmitHandler'],
    ];

    // This next section will display the output.
    $logBuild = $this->getRequestedLogs($form_state);
    if ($logBuild != FALSE) {
      $form['form_output'] = [
        '#type' => 'table',
        '#caption' => $this->t('Result:'),
        '#header' => $logBuild['build']['header'],
        '#rows' => $logBuild['build']['rows'],
        '#empty' => $this->t('No logs found'),
        '#weight' => 6,
      ];

      // Check if matching logs present in aws cloudwatch
      // only then show the pager. Also, As per AWS Cloudwatch
      // documentation, nextBackwardToken and nextForwardToken will
      // always be returned.
      if (
          !empty($logBuild['build']['rows'])
          && isset($logBuild['build']['nextForwardToken'])
        ) {
        // Custom Pagination for next and previous set of logs.
        // Set hidden form elements to recieved next forward and backword
        // tokens. this will be used when user will click on next and
        // previous action buttons.
        $form['nextForwardToken'] = [
          '#type' => 'hidden',
          '#value' => $logBuild['build']['nextForwardToken'],
        ];
        $form['nextToken'] = [
          '#type' => 'hidden',
          '#value' => '',
          // This will be ingested in submit handlers of next & backard tokens.
        ];

        // If fetched events are less than the passed limit
        // we have reached the end and no more matching events
        // are there in AWS Cloudwatch logs.
        if (is_null($logBuild['limit'])) {
          $defaultLimitForLogs = $this->getDefaultLimit();
        }
        else {
          $defaultLimitForLogs = $logBuild['limit'];
        }

        if (
          count($logBuild['build']['rows']) == $defaultLimitForLogs
          ) {
          $form['next_forward_token_button'] = [
            '#type' => 'submit',
            '#value' => $this->t('Next'),
            '#button_type' => 'primary',
            '#submit' => ['::setNextForwardTokenSubmitHandler'],
            '#weight' => 8,
          ];
        }
      } // Closing bracket for if of showing pagenition or not.
    }
    return $form;
  }

  /**
   * Ajax handler for returning matching log streams.
   */
  public function getMatchingLogStreams(
    array &$form,
    FormStateInterface $form_state
  ) {
    return $form['log_streams_fieldset']['log_streams'];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRebuild(TRUE);
  }

  /**
   * {@inheritdoc}
   *
   * Submit handler to set next forward token.
   */
  public function setNextForwardTokenSubmitHandler(
    array &$form,
    FormStateInterface $form_state
  ) {
    $nextToken = $form_state->getValue('nextForwardToken');
    $form_state->setValue('nextToken', $nextToken);
    $form_state->setRebuild(TRUE);
  }

  /**
   * Submit handler for downloading all logs in csv file.
   */
  public function downloadLogsSubmitHandler(
    array &$form,
    FormStateInterface $form_state
  ) {
    $values = $form_state->getValues();
    $startTimeTimestamp = $this->utility->dateToTimeStamp(($values['start_time']));
    $endTimeTimestamp = $this->utility->dateToTimeStamp(($values['end_time']));

    // Get AWS logs.
    $client = $this->logEvents->getClient();
    $clientResponse = $this->logEvents->getLogs(
      $client,
      $values['log_group'],
      $values['log_stream_pattern'] ? $values['log_stream_pattern'] : NULL,
      $values['log_streams'] ? $values['log_streams'] : [],
      $values['filter_pattern'] ? $values['filter_pattern'] : NULL,
      $startTimeTimestamp,
      $endTimeTimestamp,
      $values['limit'] ? $values['limit'] : NULL
    );
    if ($clientResponse) {
      $logs = $clientResponse->get('events');
      if (count($logs) > 1) {
        $response = $this->download->downloadLog($logs);
        $form_state->setResponse($response);
      }
      else {
        // Could not download. Show status.
        $this->messanger->addError($this->t('No Matching logs found.'));
      }
    }
  }

  /**
   * Gets the log events in tabular formate.
   *
   * @return array
   *   Requested matching logs ontherwise false.
   */
  public function getRequestedLogs(&$form_state) {
    // Perform this operation only in case of submit buttom click.
    $triggeringElement = $form_state->getTriggeringElement();
    if ($triggeringElement['#type'] != 'submit') {
      return FALSE;
    }

    // Initializing variables to be used.
    // Output, which would be used for generating result of requested log.
    $output = [];

    // As logGroupName are must.
    if ($form_state->getValue('log_group')) {
      $values = $form_state->getValues();

      $startTimeTimestamp = $this->utility->dateToTimeStamp(($values['start_time']));
      $endTimeTimestamp = $this->utility->dateToTimeStamp(($values['end_time']));

      $output['logGroup'] = $values['log_group'];
      $output['logStreamNamePrefix'] = $values['log_stream_pattern'] ? $values['log_stream_pattern'] : NULL;
      $output['logStreams'] = $values['log_streams'] ? $values['log_streams'] : [];
      $output['filterPattern'] = $values['filter_pattern'] ? $values['filter_pattern'] : NULL;
      $output['startTime'] = $startTimeTimestamp;
      $output['endTime'] = $endTimeTimestamp;
      $output['limit'] = $values['limit'] ? $values['limit'] : self::DEFAULT_LIMIT;
      $output['nextToken'] = isset($values['nextToken']) ? $values['nextToken'] : NULL;

      // Get AWS logs.
      $client = $this->logEvents->getClient();
      $clientResponse = $this->logEvents->getLogs(
        $client,
        $output['logGroup'],
        $output['logStreamNamePrefix'],
        $output['logStreams'],
        $output['filterPattern'],
        $output['startTime'],
        $output['endTime'],
        $output['limit'],
        $output['nextToken']
      );

      // If we revieve any matching log then only send the output else false.
      if ($clientResponse) {
        $logs = $clientResponse->get('events');
        $output['build'] = $this->utility->generateLogTable($logs);
        if ($clientResponse->get('nextToken')) {
          $output['build']['nextForwardToken'] = $clientResponse->get('nextToken');
        }
        return $output;
      }

      return FALSE;
    }
  }

  /**
   * Gets the default limit.
   *
   * @return int
   *   The default limit.
   */
  public function getDefaultLimit() {
    return self::DEFAULT_LIMIT;
  }

}
