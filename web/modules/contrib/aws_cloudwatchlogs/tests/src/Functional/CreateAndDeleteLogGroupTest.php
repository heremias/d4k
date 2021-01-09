<?php

namespace Drupal\Tests\aws_cloudwatchlogs\Functional;

use Drupal\Tests\BrowserTestBase;
use Aws\CloudWatchLogs\CloudWatchLogsClient;

/**
 * Test create and delete log group services.
 */
class CreateAndDeleteLogGroupTest extends BrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = ['aws_cloudwatchlogs'];

  /**
   * Define the default theme for test.
   *
   * @var string
   */
  protected $defaultTheme = 'stable';

  /**
   * User with permission to administer site and aws_cloudwatchlogs module.
   *
   * @var object
   */
  protected $adminUser;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    // Create administrative user.
    $this->adminUser = $this->drupalCreateUser(
      [
        'administer site configuration',
        'aws_cloudwatchlogs administer settings',
      ]
    );
    $this->drupalLogin($this->adminUser);
  }

  /**
   * Test if create/delete log group service working.
   */
  public function testCreateDeleteLogGroup() {
    $config['region'] = 'ap-south-1';
    $config['version'] = 'latest';
    $config['access_key'] = $this->randomString('20');
    $config['secret'] = $this->randomString('40');

    // Save values in settings form.
    $this->drupalPostForm(
      '/admin/reports/aws-cloudwatchlogs/settings',
      $config,
      'Save configuration'
    );
    $this->assertSession()->statusCodeEquals(200);

    // Returns a Drupal\aws_cloudwatchlogs\Services\GetClient object.
    $client = \Drupal::service('aws_cloudwatchlogs.get_client');
    $output = $client->getClient();
    // Client should be an object of Aws\CloudWatchLogs\CloudWatchLogsClient.
    $this->assertInstanceOf(
      CloudWatchLogsClient::class,
      $output,
      'Connection could not be established.'
    );

    // Test create log group Service.
    $createLogGroupService = \Drupal::service('aws_cloudwatchlogs.create_log_group');
    $logGroupName = 'phpunit_test_' . $this->randomString('10');

    // Load the site name out of configuration.
    $siteConfig = \Drupal::config('system.site');
    $groupTags = [
      'appName' => $siteConfig->get('name'),
      'author' => $this->adminUser->getEmail(),
    ];
    // False expected as secret key and password are randomly generated.
    $createdGroup = $createLogGroupService->create($output, $logGroupName, $groupTags);
    $this->assertFalse($createdGroup, 'Create log group: AwsException exception should be handled here. False was expected.');

    // Test delete log group service.
    $deleteLogGroupService = \Drupal::service('aws_cloudwatchlogs.delete_log_group');

    // False expected as secret key and password are randomly generated.
    $deletedGroup = $deleteLogGroupService->delete($output, $logGroupName);
    $this->assertFalse($deletedGroup, 'Delete log group: AwsException exception should be handled here. False was expected.');
  }

}
