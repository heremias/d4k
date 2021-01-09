<?php

namespace Drupal\aws_cloudwatchlogs\Services;

use Psr\Log\LoggerInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Service to provide download feature of logs.
 */
class Download {

  // Use this trait for using t() inside custom service.
  use StringTranslationTrait;

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
   * Object for generatin CSV.
   *
   * @var object
   */
  private $csvHandler;

  /**
   * Constructs a new instance.
   *
   * @param \Drupal\aws_cloudwatchlogs\Services\GenerateCSV $generateCSV
   *   Service for generating csv file with given input.
   * @param \Psr\Log\LoggerInterface $logger
   *   Object for logging in drupal application.
   * @param \Drupal\Core\Messenger\MessengerInterface $messanger
   *   Object for showing status messages.
   */
  public function __construct(
    GenerateCSV $generateCSV,
    LoggerInterface $logger,
    MessengerInterface $messanger
  ) {
    $this->csvHandler = $generateCSV;
    $this->logger = $logger;
    $this->messanger = $messanger;
  }

  /**
   * Provides feature for on-fly downlading.
   *
   * @param array $log
   *   Array of logs returned from aws cloudwatch logs.
   *
   * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
   *   Binary response of the file to download.
   */
  public function downloadLog(array $log) {
    $logFile = $this->csvHandler->generateLogCsv($log);
    return $this->streamFile($logFile);
  }

  /**
   * Method to stream created log file.
   *
   * @param string $file_path
   *   File physical path.
   *
   * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
   *   Binary response of the file to download.
   */
  protected function streamFile(string $file_path) {
    $binary_file_response = new BinaryFileResponse($file_path);
    $binary_file_response->setContentDisposition(
      ResponseHeaderBag::DISPOSITION_ATTACHMENT,
      basename($file_path)
    );
    $binary_file_response->deleteFileAfterSend(TRUE);
    return $binary_file_response;
  }

}
