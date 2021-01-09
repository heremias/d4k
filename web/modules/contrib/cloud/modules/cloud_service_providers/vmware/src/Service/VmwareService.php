<?php

namespace Drupal\vmware\Service;

use Drupal\cloud\Plugin\cloud\config\CloudConfigPluginManagerInterface;
use Drupal\cloud\Service\CloudServiceBase;
use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\Batch\BatchBuilder;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Http\ClientFactory;
use Drupal\Core\Lock\LockBackendInterface;
use Drupal\Core\Queue\QueueFactory;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class VmwareService.
 */
class VmwareService extends CloudServiceBase implements VmwareServiceInterface {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The config factory.
   *
   * Subclasses should use the self::config() method, which may be overridden to
   * address specific needs when loading config, rather than this property
   * directly. See \Drupal\Core\Form\ConfigFormBase::config() for an example of
   * this.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Guzzle client.
   *
   * @var \GuzzleHttp\Client
   */
  protected $httpClient;

  /**
   * The cloud service provider plugin manager (CloudConfigPluginManager).
   *
   * @var \Drupal\cloud\Plugin\cloud\config\CloudConfigPluginManagerInterface
   */
  protected $cloudConfigPluginManager;

  /**
   * The lock interface.
   *
   * @var \Drupal\Core\Lock\LockBackendInterface
   */
  protected $lock;

  /**
   * The queue factory.
   *
   * @var \Drupal\Core\Queue\QueueFactory
   */
  protected $queueFactory;

  /**
   * The credentials from set method.
   *
   * @var array
   */
  private $credentials;

  /**
   * Constructs a new VmwareService object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   An entity type manager instance.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   A configuration factory.
   * @param \Drupal\Core\Http\ClientFactory $client_factory
   *   The http client.
   * @param \Drupal\cloud\Plugin\cloud\config\CloudConfigPluginManagerInterface $cloud_config_plugin_manager
   *   The cloud service provider plugin manager.
   * @param \Drupal\Core\Lock\LockBackendInterface $lock
   *   The lock interface.
   * @param \Drupal\Core\Queue\QueueFactory $queue_factory
   *   The queue factory.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager,
                              ConfigFactoryInterface $config_factory,
                              ClientFactory $client_factory,
                              CloudConfigPluginManagerInterface $cloud_config_plugin_manager,
                              LockBackendInterface $lock,
                              QueueFactory $queue_factory) {

    // The parent constructor takes care of $this->messenger object.
    parent::__construct();

    $this->entityTypeManager = $entity_type_manager;
    $this->configFactory = $config_factory;
    $this->httpClient = $client_factory->fromOptions();
    $this->cloudConfigPluginManager = $cloud_config_plugin_manager;
    $this->lock = $lock;
    $this->queueFactory = $queue_factory;
  }

  /**
   * {@inheritdoc}
   */
  public function setCloudContext($cloud_context) {
    $this->cloudContext = $cloud_context;
    $this->cloudConfigPluginManager->setCloudContext($cloud_context);
  }

  /**
   * {@inheritdoc}
   */
  public function setCredentials(array $credentials) {
    $this->credentials = $credentials;
  }

  /**
   * {@inheritdoc}
   */
  public function login() {
    return $this->request('post', 'rest/com/vmware/cis/session');
  }

  /**
   * Setup any default parameters for the Guzzle request.
   *
   * @return array
   *   Array of parameters.
   */
  private function getDefaultParams() {
    if (empty($this->credentials)) {
      $this->credentials = $this->cloudConfigPluginManager->loadCredentials();
    }

    // Add a slash in the end of vcenter_url if it doesn't exist.
    if (substr($this->credentials['vcenter_url'], -1) !== '/') {
      $this->credentials['vcenter_url'] .= '/';
    }

    $params = [
      'verify' => FALSE,
      'headers' => [
        'Authorization' => 'Basic ' . base64_encode("{$this->credentials['vcenter_username']}:{$this->credentials['vcenter_password']}"),
      ],
    ];
    return $params;
  }

  /**
   * Helper method to do a Guzzle HTTP Request.
   *
   * @param string $http_method
   *   The http method in lower case.
   * @param string $endpoint
   *   The endpoint to access.
   * @param array $params
   *   Parameters to pass to the request.
   *
   * @return array
   *   Array interpretation of the response body.
   */
  private function request($http_method, $endpoint, array $params = []) {
    $output = NULL;
    try {
      $params = array_merge_recursive($this->getDefaultParams(), $params);
      $response = $this->httpClient->$http_method(
        $this->credentials['vcenter_url'] . $endpoint,
        $params
      );
      $output = $response->getBody()->getContents();
    }
    catch (GuzzleException $error) {
      $message = new FormattableMarkup(
        'VMware API error. Error details are as follows:<pre>@response</pre>',
        [
          '@response' => $error->getMessage(),
        ]
      );
      $this->logError('Remote API Connection', $error, $message);
    }
    catch (\Exception $error) {
      $this->logError('Remote API Connection', $error, $this->t('An unknown error
      occurred while trying to connect to the remote API. This is not a Guzzle
      error, nor an error in the remote API, rather a generic local error
      occurred. The reported error was @error',
        ['@error' => $error->getMessage()]
      ));
    }

    return empty($output) ? [] : json_decode($output, TRUE);
  }

  /**
   * Log errors to watchdog and throw an exception.
   *
   * @param string $type
   *   The error type.
   * @param \Exception $exception
   *   The exception object.
   * @param string $message
   *   The message to log.
   * @param bool $throw
   *   TRUE to throw exception.
   *
   * @throws \Drupal\vmware\Service\VmwareServiceException
   */
  private function logError($type, \Exception $exception, $message, $throw = TRUE) {
    watchdog_exception($type, $exception, $message);
    if ($throw === TRUE) {
      throw new VmwareServiceException($exception);
    }
  }

  /**
   * Generate a lock key based on entity name.
   *
   * @param string $name
   *   The entity name.
   *
   * @return string
   *   The lock key.
   */
  protected function getLockKey($name) {
    return $this->cloudContext . '_' . $name;
  }

  /**
   * Initialize a new batch builder.
   *
   * @param string $batch_name
   *   The batch name.
   *
   * @return \Drupal\Core\Batch\BatchBuilder
   *   The initialized batch object.
   */
  protected function initBatch($batch_name) {
    return (new BatchBuilder())
      ->setTitle($batch_name);
  }

  /**
   * Run the batch job to process entities.
   *
   * @param \Drupal\Core\Batch\BatchBuilder $batch_builder
   *   The batch builder object.
   */
  protected function runBatch(BatchBuilder $batch_builder) {
    // Log the start time.
    $start = time();
    $batch_array = $batch_builder->toArray();
    batch_set($batch_array);

    // Reset the progressive so batch works with out a web head.
    $batch = &batch_get();
    $batch['progressive'] = FALSE;
    batch_process();

    // Log the end time.
    $end = time();
    $this->logger('vmware_service')->info(
      $this->t('@updater - @cloud_context: Batch operation took @time seconds.',
        [
          '@cloud_context' => $this->cloudContext,
          '@updater' => $batch_array['title'],
          '@time' => $end - $start,
        ]
      )
    );
  }

  /**
   * Helper static method to clear cache.
   */
  public static function clearCacheValue() {
    \Drupal::cache('menu')->invalidateAll();
    \Drupal::service('cache.render')->deleteAll();
    \Drupal::service('router.builder')->rebuild();
    \Drupal::service('plugin.cache_clearer')->clearCachedDefinitions();
  }

  /**
   * {@inheritdoc}
   */
  public function clearAllEntities() {
    $timestamp = time();
  }

}
