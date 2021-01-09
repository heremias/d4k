<?php

namespace Drupal\aws_cloudwatchlogs\Services;

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\key\KeyRepository;
use Drupal\Core\Messenger\MessengerInterface;

/**
 * Service returns CloudwatchLogs Client.
 */
class GetClient {

  // Use this trait for using t() inside custom service.
  use StringTranslationTrait;

  /**
   * Hold the CloudWatchLogClient.
   *
   * @var object
   */
  private static $client = NULL;

  /**
   * Hold default version.
   *
   * @var string
   */
  private const DEFAULT_VERSION = 'latest';

  /**
   * Config object for basic site information.
   *
   * @var object
   */
  protected $configFactory;

  /**
   * Array of aws_cloudwatchlogs configurations.
   *
   * @var array
   */
  protected $awsCloudwatchConfig;

  /**
   * Service for loading secre/access keys from keys module.
   *
   * @var object
   */
  protected $keyRepo;

  /**
   * Messanger for showing drupal status messages.
   *
   * @var object
   */
  private $messanger;

  /**
   * Constructs a new instance.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   Config object for basic site information.
   * @param \Drupal\key\KeyRepository $key_repo
   *   Object for keyRepo service of Key module.
   * @param \Drupal\Core\Messenger\MessengerInterface $messanger
   *   Object for showing status messages.
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    KeyRepository $key_repo,
    MessengerInterface $messanger
  ) {
    $this->configFactory = $config_factory;
    $this->awsCloudwatchConfig = $this->configFactory->get('aws_cloudwatchlogs.settings')->getRawData();
    $this->keyRepo = $key_repo;
    $this->messanger = $messanger;
  }

  /**
   * Retuns client of AWS Cloudwatch logs. Implements singleton pattern.
   */
  public function getClient() {
    if (self::$client === NULL) {
      self::$client = $this->createClient();
    }
    return self::$client;
  }

  /**
   * Create client of AWS Cloudwatch logs.
   *
   * @return object
   *   AWS CloudWatchLogsClient object.
   */
  private function createClient() {
    // Use keys defined in key module configuration form.
    $accessKeyId = $this->awsCloudwatchConfig['access_key'];
    $secretKeyId = $this->awsCloudwatchConfig['secret'];
    if ($accessKeyId && $secretKeyId) {
      $accessKey = $this->keyRepo->getKey($accessKeyId)->getKeyValue();
      $secretKey = $this->keyRepo->getKey($secretKeyId)->getKeyValue();
    }
    else {
      $accessKey = $secretKey = '';
      // Show error if keys are not set.
      $this->messanger->addError($this->t('Access Key and Secret Key must be set in settings form.'));
    }

    $cloudWatchClient = new CloudWatchLogsClient([
      'region' => $this->awsCloudwatchConfig['region'],
      'version' => $this->getVersion(),
      'credentials' => [
        'key'    => $accessKey,
        'secret' => $secretKey,
      ],
    ]);
    return $cloudWatchClient;
  }

  /**
   * Gets the configured version.
   *
   * @return string
   *   The saved data.
   */
  private function getVersion() {
    if ($this->awsCloudwatchConfig['version']) {
      return $this->awsCloudwatchConfig['version'];
    }
    return self::DEFAULT_VERSION;
  }

}
