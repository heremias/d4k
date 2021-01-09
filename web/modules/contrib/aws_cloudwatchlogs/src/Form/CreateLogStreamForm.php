<?php

namespace Drupal\aws_cloudwatchlogs\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\aws_cloudwatchlogs\Services\CreateLogStream;
use Drupal\aws_cloudwatchlogs\Services\Utility;
use Drupal\aws_cloudwatchlogs\Services\DescribeLogGroups;
use Drupal\aws_cloudwatchlogs\Services\DescribeLogStreams;
use Drupal\Core\Messenger\MessengerInterface;

/**
 * Form for creating new log stream.
 */
class CreateLogStreamForm extends FormBase {

  /**
   * Object for service to create log stream.
   *
   * @var object
   */
  protected $createLogStreamHandler;

  /**
   * Object for service defining generic utilities.
   *
   * @var object
   */
  protected $utility;

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
   * Messanger for showing drupal status messages.
   *
   * @var object
   */
  protected $messanger;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'aws_cloudwatchlogs_create_log_stream_form';
  }

  /**
   * {@inheritdoc}
   */
  public function __construct(
    CreateLogStream $createLogStream,
    Utility $utility,
    DescribeLogGroups $logGroups,
    DescribeLogStreams $logStreams,
    MessengerInterface $messanger
  ) {
    $this->createLogStreamHandler = $createLogStream;
    $this->utility = $utility;
    $this->logGroups = $logGroups;
    $this->logStreams = $logStreams;
    $this->messanger = $messanger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('aws_cloudwatchlogs.create_log_stream'),
      $container->get('aws_cloudwatchlogs.utility'),
      $container->get('aws_cloudwatchlogs.describe_log_groups'),
      $container->get('aws_cloudwatchlogs.describe_log_streams'),
      $container->get('messenger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $client = $this->logGroups->getClient();
    $logGroupOptions = $logStreamsOptions = [];

    // Options for log groups.
    $logGroupsList = $this->logGroups->getResult($client);
    if ($logGroupsList) {
      $logGroupOptions = $this->logGroups->getLogGroupNameOnly($logGroupsList);
    }

    // Options for log streams.
    if ($selectedLogGroup = $form_state->getValue('log_group')) {
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
    ];
    $form['log_stream_list'] = [
      '#type' => 'select',
      '#title' => $this->t('Available Log Streams'),
      '#description' => $this->t('The name of the log stream under respective log group.'),
      '#options' => $logStreamsOptions,
      '#prefix' => '<div id="log-streams-outer-wrapper">',
      '#suffix' => '</div>',
      '#multiple' => TRUE,
      '#attributes' => [
        'disabled' => 'disabled',
      ],
    ];

    $form['new_log_stream'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Log Stream Name'),
      '#description' => $this->t("<p>Creates a log stream for the specified log group. <br />You must use the following guidelines when naming a log stream:</p>
        <ul>
          <li>Log stream names must be unique within the log group.</li>
          <li>Log stream names can be between 1 and 512 characters long.</li>
          <li>The ':' (colon) and '*' (asterisk) characters are not allowed.</li>
        </ul>"),
      '#required' => TRUE,
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Create Log Stream'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * Ajax handler for returning matching log streams.
   */
  public function getMatchingLogStreams(
    array &$form,
    FormStateInterface $form_state
  ) {
    return $form['log_stream_list'];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $client = $this->createLogStreamHandler->getClient();
    $values = $form_state->getValues();
    $logGroupName = $values['log_group'];
    $logStreamName = $values['new_log_stream'];

    $createdStream = $this->createLogStreamHandler->create($client, $logGroupName, $logStreamName);
    if ($createdStream != FALSE) {
      // Log stream has been successfuly created.
      $this->messanger->addStatus($this->t('Log stream @logStream in log group @logGroup is successfuly created.', [
        '@logGroup' => $logGroupName,
        '@logStream' => $logStreamName,
      ]));
    }
  }

}
