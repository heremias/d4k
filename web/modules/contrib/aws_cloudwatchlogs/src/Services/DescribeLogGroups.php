<?php

namespace Drupal\aws_cloudwatchlogs\Services;

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Aws\Exception\AwsException;
use Drupal\aws_cloudwatchlogs\GetClientInterface;
use Psr\Log\LoggerInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Class describing service for searching matching log groups.
 */
class DescribeLogGroups implements GetClientInterface {

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
   * Retuns matching groups from AWS CloudwatchLogs.
   *
   * @param \Aws\CloudWatchLogs\CloudWatchLogsClient $client
   *   Client for AWS Cloudwatch API.
   * @param string $logGroupNamePrefix
   *   The prefix to match.
   * @param int $limit
   *   The maximum number of items returned.
   *   If you don't specify a value, the default is up to 50 items.
   * @param string $nextToken
   *   The token for the next set of items to return.
   *
   * @return Object
   *   AWS Cloudwatch API's responce for event request.
   */
  public function getResult(
    CloudWatchLogsClient $client,
    string $logGroupNamePrefix = NULL,
    int $limit = NULL,
    string $nextToken = NULL
  ) {

    // Initializing the Output.
    $clientResponse = FALSE;

    $parameters = [];

    if ($logGroupNamePrefix != NULL) {
      // The prefix to match.
      $parameters['logGroupNamePrefix'] = $logGroupNamePrefix;
    }

    if ($nextToken != NULL) {
      $parameters['nextToken'] = $nextToken;
    }

    if ($limit != NULL) {
      $parameters['limit'] = $limit;
    }

    try {
      $clientResponse = $client->describeLogGroups($parameters);
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

  /**
   * Gets the log group name only from aws result array.
   *
   * @param object $awsResult
   *   The aws result.
   *
   * @return array
   *   Associative array of log group.
   */
  public function getLogGroupNameOnly($awsResult) {
    $list = [];
    $groupNameList = $awsResult->get('logGroups');
    foreach ($groupNameList as $group) {
      $list[$group['logGroupName']] = $group['logGroupName'];
    }
    return $list;
  }

  /**
   * Check if Log a group exist.
   *
   * @param \Aws\CloudWatchLogs\CloudWatchLogsClient $client
   *   The client.
   * @param string $logGroupName
   *   The log group name.
   *
   * @return bool
   *   If log group exist return true else false.
   */
  public function logGroupExist(
    CloudWatchLogsClient $client,
    string $logGroupName
    ) {
    $logGroupData = $this->getResult($client, $logGroupName);
    if ($logGroupData != FALSE) {
      $logGroupExist = $logGroupData->get('logGroups');
      if (count($logGroupExist) > 0) {
        return TRUE;
      }
    }
    return FALSE;
  }

}
