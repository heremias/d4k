<?php

namespace Drupal\aws_cloudwatchlogs\Services;

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Aws\Exception\AwsException;
use Drupal\aws_cloudwatchlogs\GetClientInterface;
use Psr\Log\LoggerInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Class describing service for searching matching cloudwatch events.
 */
class FilterLogEvents implements GetClientInterface {

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
   * Retuns matching logs from AWS CloudwatchLogs.
   *
   * @param \Aws\CloudWatchLogs\CloudWatchLogsClient $client
   *   Client for AWS Cloudwatch API.
   * @param string $logGroupName
   *   The name of the log group to query.
   * @param string $logStreamNamePrefix
   *   Filters the results to include only events from log
   *   streams that have names starting with this prefix.
   * @param array $logStreamNames
   *   Optional list of log stream names in the specified log group to search.
   *   Defaults to all the log streams in the log group.
   * @param string $filterPattern
   *   A valid CloudWatch Logs filter pattern to use for filtering response.
   *   If not provided, all the events are matched.
   * @param int $startTime
   *   A unix timestamp indicating the start time of the range for the request.
   * @param int $endTime
   *   A unix timestamp indicating the end time of the range for the request.
   * @param int $limit
   *   The maximum number of events to return in a page of results.
   * @param string $nextToken
   *   A pagination token obtained from a FilterLogEvents response to
   *   continue paginating the FilterLogEvents results.
   *
   * @return Object
   *   AWS Cloudwatch API's responce for event request.
   */
  public function getLogs(
    CloudWatchLogsClient $client,
    string $logGroupName,
    string $logStreamNamePrefix = NULL,
    array $logStreamNames = [],
    string $filterPattern = NULL,
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
    ];

    // If log Stream Pattern has been entered, give priority to it.
    if (is_null($logStreamNamePrefix)) {
      if (count($logStreamNames) > 0) {
        $eventDesc['logStreamNames'] = array_values($logStreamNames);
      }
    }
    else {
      $eventDesc['logStreamNamePrefix'] = $logStreamNamePrefix;
    }

    // Add filter pattern to logs.
    if ($filterPattern != NULL) {
      $eventDesc['filterPattern'] = $filterPattern;
    }

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
      $clientResponse = $client->filterLogEvents($eventDesc);
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
