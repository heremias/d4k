<?php

namespace Drupal\sfc\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Extension\ThemeHandlerInterface;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Derives SFC plugin definitions from .sfc files.
 */
class SimpleComponentDeriver extends DeriverBase implements ContainerDeriverInterface {

  use StringTranslationTrait;

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The theme handler.
   *
   * @var \Drupal\Core\Extension\ThemeHandlerInterface
   */
  protected $themeHandler;

  /**
   * The file system.
   *
   * @var \Drupal\Core\File\FileSystemInterface
   */
  protected $fileSystem;

  /**
   * SimpleComponentDeriver constructor.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   * @param \Drupal\Core\Extension\ThemeHandlerInterface $theme_handler
   *   The theme handler.
   * @param \Drupal\Core\File\FileSystemInterface $file_system
   *   The file system.
   */
  public function __construct(ModuleHandlerInterface $module_handler, ThemeHandlerInterface $theme_handler, FileSystemInterface $file_system) {
    $this->moduleHandler = $module_handler;
    $this->themeHandler = $theme_handler;
    $this->fileSystem = $file_system;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static(
      $container->get('module_handler'),
      $container->get('theme_handler'),
      $container->get('file_system')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $directories = array_merge($this->moduleHandler->getModuleDirectories(), $this->themeHandler->getThemeDirectories());
    foreach ($directories as $project => $directory) {
      if (!is_dir($directory . '/components/')) {
        continue;
      }
      foreach ($this->fileSystem->scanDirectory($directory . '/components/', '/^.*\.sfc/') as $file) {
        $id = str_replace('.sfc', '', $file->filename);
        $this->derivatives[$id] = $base_plugin_definition;
        $this->derivatives[$id]['simple_file'] = $file->uri;
        $this->derivatives[$id]['alt_id'] = $id;
        $this->derivatives[$id]['provider'] = $project;
        $this->derivatives[$id] = array_merge($this->derivatives[$id], $this->getDefinitionAdditions($file->uri));
      }
    }
    return $this->derivatives;
  }

  /**
   * Gets plugin definition additions defined by a simple component file.
   *
   * This is in a separate function to avoid variables in the .sfc file
   * polluting the ::getDerivativeDefinitions scope.
   *
   * @param string $filename
   *   The simple component filename.
   *
   * @return array
   *   An array representing the plugin definition additions.
   */
  protected function getDefinitionAdditions($filename) {
    $definition = [];
    ob_start();
    require $filename;
    ob_end_clean();
    return $definition;
  }

}
