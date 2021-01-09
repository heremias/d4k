<?php

namespace Drupal\aws_cloudwatchlogs\Services;

use Psr\Log\LoggerInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\filelog\FileLogException;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\File\FileSystem;
use Drupal\Core\File\FileSystemInterface;

/**
 * Service to create CSV file from array.
 */
class GenerateCSV {

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
   * Utilty service of aws_cloudwatch logs.
   *
   * @var object
   */
  private $utility;

  /**
   * Path of log file for instant generations.
   */
  protected const LOG_DIR_NAME = '/aws_cloudwatchlogs';

  /**
   * Path of log file for instant generations.
   */
  protected const FILE_NAME = '/aws_cloudwatchlogs-';

  /**
   * Path of log file for instant generations.
   */
  protected const CSV_EXT = '.csv';

  /**
   * Object of applications file system service.
   *
   * @var object
   */
  public $fileSystem;

  /**
   * Constructs a new instance.
   *
   * @param \Psr\Log\LoggerInterface $logger
   *   Object for logging in drupal application.
   * @param \Drupal\Core\Messenger\MessengerInterface $messanger
   *   Object for showing status messages.
   * @param \Drupal\aws_cloudwatchlogs\Services\Utility $utility
   *   Object of general functionalities of this module.
   * @param \Drupal\Core\File\FileSystem $fileSystem
   *   Object of file_system service.
   */
  public function __construct(
    LoggerInterface $logger,
    MessengerInterface $messanger,
    Utility $utility,
    FileSystem $fileSystem
  ) {
    $this->logger = $logger;
    $this->messanger = $messanger;
    $this->utility = $utility;
    $this->fileSystem = $fileSystem;
  }

  /**
   * Generate AWS logs CSV file from Array.
   *
   * @param array $fileData
   *   Input data for CSV file.
   */
  public function generateLogCsv(array $fileData) {
    $dir = $this->getDirPath();
    // Open CSV only if the respective directory exist and writable.
    if ($this->ensureDirExistAndWritable($dir)) {
      $destination = $this->getCompleteFileName($dir);
      $file = fopen($destination, "w");

      // Defining header for csv.
      fputcsv($file, array_keys($fileData[0]));
      foreach ($fileData as $data) {
        // Convert timestamp to readable datetime format.
        if (isset($data['timestamp'])) {
          $data['timestamp'] = $this->utility->timestampToDate(
            $data['timestamp'],
            'Y-M-d - H:i:s'
          );
        }
        // Convert timestamp to readable datetime format.
        if (isset($data['ingestionTime'])) {
          $data['ingestionTime'] = $this->utility->timestampToDate(
            $data['ingestionTime'],
            'Y-M-d - H:i:s'
          );
        }

        // Convert each element to string to avoid long integer converted to
        // scintfic notation issue.
        fputcsv($file, array_map(function ($value) {
          // Adding "\r" at the end of each field to force it as text.
          return $value . "\r";
        }, $data));

      }
      fclose($file);

      // Return file path.
      return $destination;
    }
    else {
      throw new FileLogException('The log directory has disappeared.');
    }

  }

  /**
   * Gets the directory path where log file will be created.
   *
   * @return string
   *   Directory of where the log file will be created.
   */
  public function getDirPath() {
    $tempPath = $this->fileSystem->getTempDirectory();
    $location = $tempPath . self::LOG_DIR_NAME;
    return $location;
  }

  /**
   * Ensure that directory exist and writable for logs.
   *
   * @param string $path
   *   The directory to for files to create.
   *
   * @return bool
   *   TRUE if the directory exists and is writable. FALSE otherwise.
   */
  public function ensureDirExistAndWritable(string $path) {
    return $this->fileSystem->prepareDirectory(
      $path,
      FileSystemInterface::CREATE_DIRECTORY
    );
  }

  /**
   * Gets the complete fil name for log.
   *
   * @param string $directory
   *   The directory where file needs to be created.
   *
   * @return string
   *   Complete file path with file name.
   */
  public function getCompleteFileName(string $directory) {
    $createTime = date('Y-m-d-H-i-s');
    $path = $directory . self::FILE_NAME . $createTime . self::CSV_EXT;
    return $path;
  }

}
