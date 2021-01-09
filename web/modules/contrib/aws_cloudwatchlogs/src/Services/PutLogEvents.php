<?php

namespace Drupal\aws_cloudwatchlogs\Services;

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Aws\Exception\AwsException;
use Drupal\aws_cloudwatchlogs\GetClientInterface;
use Psr\Log\LoggerInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Class describing service for creating log group in AWS cloudwatch logs.
 */
class PutLogEvents implements GetClientInterface {

  // Use this trait for using t() inside custom service.
  use StringTranslationTrait;

  /**
   * Client for cloudwatch service.
   *
   * @var object
   */
  private $client;

  /**
   * Logger for aws_cloudwatchlogs channel only.
   *
   * @var object
   */
  private $logger;

  /**
   * Messanger for showing drupal status messages.
   *
   * @var object
   */
  private $messanger;

  /**
   * Handler for creating log group.
   *
   * @var object
   */
  private $createLogGroupHandler;

  /**
   * Handler for creating log stream.
   *
   * @var object
   */
  private $createLogStreamHandler;

  /**
   * Handler for geting information of existing log stream.
   *
   * @var object
   */
  private $describeLogStreamHandler;

  /**
   * Object for utility service.
   *
   * @var object
   */
  private $utility;

  /**
   * Constructs a new instance.
   *
   * @param \Drupal\aws_cloudwatchlogs\Services\GetClient $clientInstance
   *   GetClient instance for loading the existing client.
   * @param \Psr\Log\LoggerInterface $logger
   *   Object for logging in drupal application.
   * @param \Drupal\Core\Messenger\MessengerInterface $messanger
   *   Object for showing status messages.
   * @param \Drupal\aws_cloudwatchlogs\Services\CreateLogGroup $createLogGroup
   *   For creating new log group.
   * @param \Drupal\aws_cloudwatchlogs\Services\CreateLogStream $createLogStream
   *   Service for creating new log group.
   * @param \Drupal\aws_cloudwatchlogs\Services\DescribeLogStreams $describeLogStream
   *   Service to get information of an existing log stream.
   * @param \Drupal\aws_cloudwatchlogs\Services\DescribeLogGroups $describelogGroup
   *   Service to get information of an existing log group.
   * @param \Drupal\aws_cloudwatchlogs\Services\Utility $utility
   *   Object of service of basic utilities of this module.
   */
  public function __construct(
    GetClient $clientInstance,
    LoggerInterface $logger,
    MessengerInterface $messanger,
    CreateLogGroup $createLogGroup,
    CreateLogStream $createLogStream,
    DescribeLogStreams $describeLogStream,
    DescribeLogGroups $describelogGroup,
    Utility $utility
  ) {
    $this->client = $clientInstance;
    $this->logger = $logger;
    $this->messanger = $messanger;
    $this->createLogGroupHandler = $createLogGroup;
    $this->createLogStreamHandler = $createLogStream;
    $this->describeLogStreamHandler = $describeLogStream;
    $this->describelogGroupHandler = $describelogGroup;
    $this->utility = $utility;
  }

  /**
   * {@inheritdoc}
   */
  public function getClient() {
    return $this->client->getClient();
  }

  /**
   * Creates log group in AWS CloudwatchLogs.
   *
   * @todo Enable KMS encryption while creating log group.
   *
   * @param \Aws\CloudWatchLogs\CloudWatchLogsClient $client
   *   Client for AWS Cloudwatch API.
   * @param string $message
   *   Message to log.
   * @param string $logGroupName
   *   The name of the log group.
   * @param string $logStreamName
   *   The name of the log stream.
   * @param string $sequenceToken
   *   The sequence token obtained from the response of the previous
   *   PutLogEvents call. Can be null in case of new logStreamName.
   *
   * @return object
   *   AWS Cloudwatch API's responce for event request.
   */
  public function putLog(
    CloudWatchLogsClient $client,
    string $message,
    string $logGroupName,
    string $logStreamName,
    string $sequenceToken = NULL
  ) {

    // Initializing the Output.
    $clientResponse = FALSE;

    $logEvents = [
      [
        'message' => $message,
        'timestamp' => time() * 1000,
      ],
    ];

    $parameters = [
      'logEvents' => $logEvents,
      'logGroupName' => $logGroupName,
      'logStreamName' => $logStreamName,
    ];

    if ($sequenceToken != NULL) {
      $parameters['sequenceToken'] = $sequenceToken;
    }

    try {
      $clientResponse = $client->putLogEvents($parameters);
    }
    catch (AwsException $e) {
      $errorCode = $e->getAwsErrorCode();

      switch ($errorCode) {
        case 'ResourceNotFoundException':
          $this->handleResourceNotFoundException($client, $message, $logGroupName, $logStreamName);
          break;

        case 'DataAlreadyAcceptedException':
        case 'InvalidSequenceTokenException':
          // Get the sequence number from logstream and insert as new log.
          $logStreams = $this->describeLogStreamHandler->getResult($client, $logGroupName, $logStreamName);
          $logStreamInfo = $logStreams->get('logStreams');
          // The matching logstream will always be the first one of array
          // if not then it would fall under first case.
          $sequenceToken = $logStreamInfo[0]['uploadSequenceToken'];
          $this->putLog($client, $message, $logGroupName, $logStreamName, $sequenceToken);
          break;

        default:
          // Log/Output error message if fails.
          $this->messanger->addError($this->t('AwsException: @error', [
            '@error' => $e->getMessage(),
          ]));
          $this->logger->error($e->getMessage());
          break;
      }

    }

    return $clientResponse;
  }

  /**
   * Callback to handle the ResourceNotFoundException.
   *
   * It creates new log group/stream if does not exist and logs message in it.
   *
   * @param \Aws\CloudWatchLogs\CloudWatchLogsClient $client
   *   The client.
   * @param string $message
   *   The message to log.
   * @param string $logGroupName
   *   The log group name.
   * @param string $logStreamName
   *   The log stream name.
   */
  public function handleResourceNotFoundException(
    CloudWatchLogsClient $client,
    string $message,
    string $logGroupName,
    string $logStreamName
  ) {
    // Call to describe group for checking ig log group exist.
    $logGroupExist = $this->describelogGroupHandler->logGroupExist($client, $logGroupName);

    if ($logGroupExist == FALSE) {
      // Log group does not exist create a new one and inject log in it.
      $groupTags = [
        'appName' => $this->utility->getSiteName(),
        'author' => $this->utility->getAccountEmail(),
      ];
      $this->createLogGroupHandler->create($client, $logGroupName, $groupTags);
    }
    // Create log stream, in both cases new log stream will be created
    // for existing and newly created log group.
    $this->createLogStreamHandler->create($client, $logGroupName, $logStreamName);
    $this->putLog($client, $message, $logGroupName, $logStreamName);
  }

}
