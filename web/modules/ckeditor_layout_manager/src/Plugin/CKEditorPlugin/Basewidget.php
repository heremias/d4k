<?php

namespace Drupal\ckeditor_layout_manager\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "basewidget" plugin.
 *
 * @CKEditorPlugin(
 *   id = "basewidget",
 *   label = @Translation("CKEditor Basewidget"),
 * )
 */
class Basewidget extends CKEditorPluginBase {

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return drupal_get_path('module', 'ckeditor_layout_manager') . '/js/plugins/basewidget/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [];
  }

}
