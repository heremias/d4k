<?php

namespace Drupal\aws_cloudwatchlogs\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\aws_cloudwatchlogs\Services\Download;
use Drupal\aws_cloudwatchlogs\Services\GetLogEvents;
use Drupal\aws_cloudwatchlogs\Services\Utility;
use Drupal\aws_cloudwatchlogs\Services\DescribeLogGroups;
use Drupal\aws_cloudwatchlogs\Services\DescribeLogStreams;
use Drupal\Core\Messenger\MessengerInterface;

/**
 * Form for generating AWS CloudWatch logs.
 */
class GenerateLogForm extends FormBase {

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
   * Client of AWS Clpudwatch Service.
   *
   * @var object
   */
  protected $client;

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
    return 'aws_cloudwatchlogs_generate_log_form';
  }

  /**
   * {@inheritdoc}
   */
  public function __construct(
    GetLogEvents $getLogEvents,
    Download $download,
    MessengerInterface $messanger,
    DescribeLogGroups $logGroups,
    DescribeLogStreams $logStreams,
    Utility $utility
  ) {
    $this->logEvents = $getLogEvents;
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
      $container->get('aws_cloudwatchlogs.get_log_events'),
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
    $form['log_stream'] = [
      '#type' => 'select',
      '#title' => $this->t('Log Stream Name'),
      '#description' => $this->t('The name of the log stream under respective log group.'),
      '#options' => $logStreamsOptions,
      '#prefix' => '<div id="log-streams-outer-wrapper">',
      '#suffix' => '</div>',
      '#required' => TRUE,
      '#multiple' => FALSE,
      '#weight' => 1,
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
      '#description' => $this->t('The time upto which you have to search/generate the logs for.'),
      '#weight' => 3,
    ];
    $form['limit'] = [
      '#type' => 'number',
      '#title' => $this->t('Limit'),
      '#description' => $this->t('Number of logs to fetch, Default number of logs are 20.'),
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

    // This next section will display the output. This section
    // will only be entered after the form has been submitted,
    // as $form_state->getValues() is empty upon the initial form build.
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
      if (!empty($logBuild['build']['rows'])) {
        // Custom Pagination for next and previous set of logs.
        // Set hidden form elements to recieved next forward and backword
        // tokens. this will be used when user will click on next and
        // previous action buttons.
        $form['nextForwardToken'] = [
          '#type' => 'hidden',
          '#value' => $logBuild['build']['nextForwardToken'],
        ];
        $form['nextBackwardToken'] = [
          '#type' => 'hidden',
          '#value' => $logBuild['build']['nextBackwardToken'],
        ];
        $form['nextToken'] = [
          '#type' => 'hidden',
          '#value' => '',
          // This will be ingested in submit handlers of next & backard tokens.
        ];

        if (!is_null($logBuild['nextToken'])) {
          // $nextToken will be null in case of first set of records fetch.
          // And in this case no need to show previous link.
          $form['next_backward_token_button'] = [
            '#type' => 'submit',
            '#value' => $this->t('Previous'),
            '#button_type' => 'primary',
            '#submit' => ['::setNextBackwardTokenSubmitHandler'],
            '#weight' => 7,
          ];
        }

        // If fetched events are less than the passed limit
        // we have reached the end and no more matching events
        // are there in AWS Cloudwatch logs.
        if (is_null($logBuild['limit'])) {
          $defaultLimitForLogs = $this->getDefaultLimit();
        }
        else {
          $defaultLimitForLogs = $logBuild['limit'];
        }

        if (count($logBuild['build']['rows']) == $defaultLimitForLogs) {
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
    return $form['log_stream'];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // For fresh start of log requesting.
    $form_state->setValue('nextToken', NULL);
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
   * {@inheritdoc}
   *
   * Submit handler to set next forward token.
   */
  public function setNextBackwardTokenSubmitHandler(
    array &$form,
    FormStateInterface $form_state
  ) {
    $nextToken = $form_state->getValue('nextBackwardToken');
    $form_state->setValue('nextToken', $nextToken);
    $form_state->setRebuild(TRUE);
  }

  /**
   * Submit handler for downloading all logs in csv file.
   */
  public function downloadLogsSubmitHandler(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $startTimeTimestamp = $this->utility->dateToTimeStamp(($values['start_time']));
    $endTimeTimestamp = $this->utility->dateToTimeStamp(($values['end_time']));

    // Get AWS logs.
    $client = $this->logEvents->getClient();
    $clientResponse = $this->logEvents->getLogs(
      $client,
      $values['log_group'],
      $values['log_stream'],
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
    // Initializing variables to be used.
    // Perform this operation only in case of submit buttom click.
    $triggeringElement = $form_state->getTriggeringElement();
    if ($triggeringElement['#type'] != 'submit') {
      return FALSE;
    }

    // Output, which would be used for generating result of requested log.
    $output = [];

    // As logGroupName and logStreamName are must.
    // So if no such parameter is being provided or being modifed
    // directly from url then dont show the result.
    if (
      $form_state->getValue('log_group')
      && $form_state->getValue('log_stream')
      ) {
      $values = $form_state->getValues();

      $startTimeTimestamp = $this->utility->dateToTimeStamp(($values['start_time']));
      $endTimeTimestamp = $this->utility->dateToTimeStamp(($values['end_time']));
      $output['logGroup'] = $values['log_group'];
      $output['logStream'] = $values['log_stream'] ? $values['log_stream'] : NULL;
      $output['startTime'] = $startTimeTimestamp;
      $output['endTime'] = $endTimeTimestamp;
      $output['limit'] = $values['limit'] ? $values['limit'] : self::DEFAULT_LIMIT;
      $output['nextToken'] = isset($values['nextToken']) ? $values['nextToken'] : NULL;

      // Get AWS logs.
      $client = $this->logEvents->getClient();
      $clientResponse = $this->logEvents->getLogs(
        $client,
        $output['logGroup'],
        $output['logStream'],
        $output['startTime'],
        $output['endTime'],
        $output['limit'],
        $output['nextToken']
      );

      // If we revieve any matching log then only send the output else false.
      if ($clientResponse) {
        $logs = $clientResponse->get('events');
        $output['build'] = $this->utility->generateLogTable($logs);
        $output['build']['nextForwardToken'] = $clientResponse->get('nextForwardToken');
        $output['build']['nextBackwardToken'] = $clientResponse->get('nextBackwardToken');

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
