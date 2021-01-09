<?php

namespace Drupal\Tests\aws_cloudwatchlogs\Functional;

use Drupal\Tests\BrowserTestBase;
use Aws\CloudWatchLogs\CloudWatchLogsClient;

/**
 * Test that client connection of AWS Cloudwatchlogs.
 */
class CloudwatchClientConnectionTest extends BrowserTestBase {

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
   * Test if connection can be made with the AWS cloudwatch log client.
   */
  public function testClientConnection() {
    $config['region'] = 'ap-south-1';
    $config['version'] = 'latest';
    $config['access_key'] = $this->randomString('20');
    $config['secret'] = $this->randomString('40');

    // Save values in settings form.
    $this->drupalPostForm('/admin/reports/aws-cloudwatchlogs/settings', $config, 'Save configuration');
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
  }

}
