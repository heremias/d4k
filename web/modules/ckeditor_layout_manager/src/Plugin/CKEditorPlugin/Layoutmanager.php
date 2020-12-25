<?php

namespace Drupal\ckeditor_layout_manager\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "layoutmanager" plugin.
 *
 * @CKEditorPlugin(
 *   id = "layoutmanager",
 *   label = @Translation("CKEditor Layoutmanager"),
 * )
 */
class Layoutmanager extends CKEditorPluginBase {

  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return ['basewidget'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return drupal_get_path('module', 'ckeditor_layout_manager') . '/js/plugins/layoutmanager/plugin.js';
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
    return [
      'AddLayout' => [
        'label' => $this->t('Layout Manager'),
        'image' => drupal_get_path('module', 'ckeditor_layout_manager') . '/js/plugins/layoutmanager/icons/addlayout.png',
      ],
    ];
  }

}
