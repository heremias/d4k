<?php

namespace Drupal\config_backup\Services;

use Drupal\Core\Archiver\ArchiveTar;
use Drupal\Core\Config\StorageInterface;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Serialization\Yaml;
use Drupal\Core\Site\Settings;

/**
 * Service to use with Config Backup module.
 *
 * Also @see \src\Commands\ConfigBackupCommands.php.
 */
class ConfigBackupService {

  /**
   * The file system.
   *
   * @var \Drupal\Core\File\FileSystemInterface
   */
  protected $fileSystem;

  /**
   * The export storage.
   *
   * @var \Drupal\Core\Config\StorageInterface
   */
  protected $exportStorage;

  /**
   * The settings object.
   *
   * @var \Drupal\Core\Site\Settings
   */
  protected $settings;

  /**
   * EmployeeService constructor.
   *
   * @param \Drupal\Core\File\FileSystemInterface $file_system
   *   The file system.
   * @param \Drupal\Core\Config\StorageInterface $export_storage
   *   The export storage.
   * @param \Drupal\Core\Site\Settings $settings
   *   The settings object.
   */
  public function __construct(
    FileSystemInterface $file_system,
    StorageInterface $export_storage,
    Settings $settings
  ) {
    $this->fileSystem = $file_system;
    $this->exportStorage = $export_storage;
    $this->settings = $settings;
  }

  /**
   * Run backup process.
   */
  public function backup() {
    $directory = $this->settings->get('config_backup_directory');
    if (empty($directory)) {
      $this->messenger()->addError($this->t('The backup directory configuration "config_backup_directory" not specified in settings.php file.'));
    }
    else {
      // Prepare dir and file name.
      $this->fileSystem->prepareDirectory($directory, FileSystemInterface::CREATE_DIRECTORY);
      $file = $directory . '/configs-' . date('Ymd_His') . '.tar.gz';
      $archiver = new ArchiveTar($file, 'gz');

      // Add all contents of the export storage to the archive.
      foreach ($this->exportStorage->listAll() as $name) {
        if ($archiver->addString("{$name}.yml", Yaml::encode($this->exportStorage->read($name)), FALSE, ['mode' => 0644]) === FALSE) {
          throw new \Exception($this->t('Failed to archive file @filename.', ['@filename' => $name]));
        }
      }
      // Get all  data from the remaining collections.
      foreach ($this->exportStorage->getAllCollectionNames() as $collection) {
        $collection_storage = $this->exportStorage->createCollection($collection);
        foreach ($collection_storage->listAll() as $name) {
          $archiver->addString(str_replace('.', '/', $collection) . "/$name.yml", Yaml::encode($collection_storage->read($name)));
        }
      }

      return $file;
    }

    return FALSE;
  }

}
