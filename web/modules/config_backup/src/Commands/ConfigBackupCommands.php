<?php

namespace Drupal\config_backup\Commands;

use Drupal\config_backup\Services\ConfigBackupService;
use Drush\Commands\DrushCommands;

/**
 * Drush commands allowing to perform config_backup tasks from the command line.
 */
class ConfigBackupCommands extends DrushCommands {

  /**
   * The Config Backup Service.
   *
   * @var \Drupal\config_backup\Services\ConfigBackupService
   */
  protected $service;

  /**
   * ConfigBackupCommands constructor.
   *
   * @param \Drupal\config_backup\Services\ConfigBackupService $service
   *   The Config Backup service.
   */
  public function __construct(ConfigBackupService $service) {
    $this->service = $service;
  }

  /**
   * Execute Config Backup.
   *
   * @command config:backup
   *
   * @usage drush config:backup
   *
   * @aliases cbkp
   */
  public function backup() {
    $res = $this->service->backup();
    $this->output()->writeln($res);
  }

}
