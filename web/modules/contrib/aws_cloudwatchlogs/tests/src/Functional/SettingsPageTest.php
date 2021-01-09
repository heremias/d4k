<?php

namespace Drupal\Tests\aws_cloudwatchlogs\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test that the settings page is recheable.
 */
class SettingsPageTest extends BrowserTestBase {

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
   * Test if config page is recheable (status 200).
   *
   * Permission is working and configurations are saved successfully.
   */
  public function testSettingsPage() {
    $config['region'] = 'ap-south-1';
    $config['version'] = 'latest';
    $config['access_key'] = $this->randomString('20');
    $config['secret'] = $this->randomString('40');

    $this->drupalPostForm('/admin/reports/aws-cloudwatchlogs/settings', $config, 'Save configuration');
    $this->assertSession()->statusCodeEquals(200);
  }

}
