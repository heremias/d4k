<?php

namespace Drupal\aws_cloudwatchlogs\Services;

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Aws\Exception\AwsException;
use Drupal\aws_cloudwatchlogs\GetClientInterface;
use Psr\Log\LoggerInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Class describing service for fetching cloudwatch logs.
 */
class GetLogEvents implements GetClientInterface {

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
   * Constructs a new instance.
   *
   * @param \Drupal\aws_cloudwatchlogs\Services\GetClient $clientInstance
   *   GetClient instance for loading the existing client.
   * @param \Psr\Log\LoggerInterface $logger
   *   Object for logging in drupal application.
   * @param \Drupal\Core\Messenger\MessengerInterface $messanger
   *   Object for showing status messages.
   */
  public function __construct(
    GetClient $clientInstance,
    LoggerInterface $logger,
    MessengerInterface $messanger
  ) {
    $this->client = $clientInstance;
    $this->logger = $logger;
    $this->messanger = $messanger;
  }

  /**
   * {@inheritdoc}
   */
  public function getClient() {
    return $this->client->getClient();
  }

  /**
   * Retuns logs from AWS CloudwatchLogs.
   *
   * @param \Aws\CloudWatchLogs\CloudWatchLogsClient $client
   *   Client for AWS Cloudwatch API.
   * @param string $logGroupName
   *   The name of the log group to query.
   * @param string $logStreamName
   *   The name of the log stream to query.
   * @param int $startTime
   *   A unix timestamp indicating the start time of the range for the request.
   * @param int $endTime
   *   A unix timestamp indicating the end time of the range for the request.
   * @param int $limit
   *   The maximum number of events to return in a page of results.
   * @param string $nextToken
   *   Token used for pagination that points to the next page of results.
   *
   * @return Object
   *   AWS Cloudwatch API's responce for event request.
   */
  public function getLogs(
    CloudWatchLogsClient $client,
    string $logGroupName,
    string $logStreamName,
    int $startTime = NULL,
    int $endTime = NULL,
    int $limit = NULL,
    string $nextToken = NULL
  ) {

    // Initializing the Output.
    $clientResponse = FALSE;

    // Describe the event for which logs will be fetched.
    $eventDesc = [
      // logGroupName is required.
      'logGroupName' => $logGroupName,
      // logStreamName is required.
      'logStreamName' => $logStreamName,
      'startFromHead' => TRUE,
    ];

    if ($startTime != NULL) {
      $eventDesc['startTime'] = $startTime;
    }

    if ($endTime != NULL) {
      $eventDesc['endTime'] = $endTime;
    }

    if ($nextToken != NULL) {
      $eventDesc['nextToken'] = $nextToken;
    }

    if ($limit != NULL) {
      $eventDesc['limit'] = $limit;
    }

    try {
      $clientResponse = $client->getLogEvents($eventDesc);
    }
    catch (AwsException $e) {
      // Log/Output error message if fails.
      $this->messanger->addError($this->t('AwsException: @error', [
        '@error' => $e->getMessage(),
      ]));
      $this->logger->error($e->getMessage());
    }

    return $clientResponse;
  }

}
