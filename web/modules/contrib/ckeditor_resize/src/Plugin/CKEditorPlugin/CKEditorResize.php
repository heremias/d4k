<?php

namespace Drupal\ckeditor_resize\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "Resize" plugin.
 *
 * @CKEditorPlugin(
 *   id = "resize",
 *   label = @Translation("Resize")
 * )
 */
class CKEditorResize extends CKEditorPluginBase {

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    $path = 'libraries/resize/plugin.js';
    if (file_exists($path)) {
      return 'libraries/resize/plugin.js';
    }
    else {
      \Drupal::messenger()->addMessage(t("The plugin.js file can't be found in libraries/resize. Please check README for installation."), 'error');
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    $path = drupal_get_path('module', 'ckeditor_resize') . '/icons';
    return [
      'Resize' => [
        'label' => t('Resize'),
        'image' => $path . '/resize.png',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

}
