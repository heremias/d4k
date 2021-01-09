<?php

namespace Drupal\aws_cloudwatchlogs\Services;

use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * This class describes an generic features of AWS Cloudwatch module.
 */
class Utility {

  // Use this trait for using t() inside custom service.
  use StringTranslationTrait;

  /**
   * Config object for basic site information.
   *
   * @var object
   */
  protected $configFactory;

  /**
   * Object of current user accessing the app.
   *
   * @var object
   */
  protected $account;

  /**
   * Constructs a new instance.
   */
  public function __construct(ConfigFactoryInterface $config_factory, AccountInterface $account) {
    $this->configFactory = $config_factory;
    $this->account = $account;
  }

  /**
   * Convert timestamp to Date.
   *
   * @param int $timestamp
   *   Unix timestamp in miliseconds.
   * @param string $format
   *   PHP date-time format.
   *
   * @return string
   *   Date in specified format.
   */
  public function timestampToDate($timestamp, $format) {
    $timestamp = $timestamp / 1000;
    // Since AWS returns timestamp in miliseconds.
    $date = DrupalDateTime::createFromTimestamp($timestamp, 'UTC');
    return $date->format($format);
  }

  /**
   * Convert a given date to timestamp in miliseconds.
   *
   * @param string $date
   *   PHP date to convert in datetime.
   *
   * @return int
   *   Timestamp in miliseconds.
   */
  public function dateToTimeStamp($date) {
    $timestamp = (int) NULL;
    if ($date) {
      $timestamp = strtotime($date) * 1000;
    }
    return $timestamp;
  }

  /**
   * Function to generate logs output in tabular format.
   *
   * @param array $events
   *   Array of AWS logs with timestamp and message.
   *
   * @return array
   *   Renderable array for table.
   */
  public function generateLogTable(array $events) {
    $header = [
      $this->t('timestamp'),
      $this->t('message'),
    ];

    $rows = [];
    foreach ($events as $event) {
      $row = [];
      $timestamp = $this->timestampToDate(
        $event['timestamp'],
        'Y-M-d - H:i:s'
      );
      $row[] = [
        'data' => [
          '#theme' => 'time',
          '#text' => $timestamp,
          '#attributes' => [
            'datetime' => $timestamp,
          ],
        ],
      ];
      $row[] = $event['message'];
      $rows[] = $row;
    }

    $build = [
      'header' => $header,
      'rows' => $rows,
    ];

    return $build;
  }

  /**
   * Gets the site name.
   *
   * @return string
   *   The site name.
   */
  public function getSiteName() {
    $siteConfig = $this->configFactory->get('system.site')->getRawData();
    return $siteConfig['name'];
  }

  /**
   * Gets the account name.
   *
   * @return string
   *   The current user's account email.
   */
  public function getAccountEmail() {
    return $this->account->getEmail();
  }

}
