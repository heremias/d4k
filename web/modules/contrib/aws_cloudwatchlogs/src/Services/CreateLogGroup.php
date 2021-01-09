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
class CreateLogGroup implements GetClientInterface {

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
   * Creates log group in AWS CloudwatchLogs.
   *
   * @todo Enable KMS encryption while creating log group.
   *
   * @param \Aws\CloudWatchLogs\CloudWatchLogsClient $client
   *   Client for AWS Cloudwatch API.
   * @param string $logGroupName
   *   The name of the log group.
   * @param array $tags
   *   The key-value pairs to use for the tags.
   *   Type: String to string map.
   *
   * @return Object
   *   AWS Cloudwatch API's responce for event request.
   */
  public function create(
    CloudWatchLogsClient $client,
    string $logGroupName,
    array $tags
  ) {

    // Initializing the Output.
    $clientResponse = FALSE;

    $parameters = [
      // logGroupName is required.
      'logGroupName' => $logGroupName,
    ];

    if ($tags != NULL) {
      $parameters['tags'] = $tags;
    }

    try {
      $clientResponse = $client->createLogGroup($parameters);
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
