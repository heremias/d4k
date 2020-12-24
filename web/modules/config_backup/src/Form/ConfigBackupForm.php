<?php

namespace Drupal\config_backup\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Site\Settings;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines the main configuration backup form.
 *
 * @internal
 */
class ConfigBackupForm extends FormBase {

  /**
   * The settings object.
   *
   * @var \Drupal\Core\Site\Settings
   */
  protected $settings;

  /**
   * Constructs a new ConfigBackupForm.
   *
   * @param \Drupal\Core\Site\Settings $settings
   *   The settings object.
   */
  public function __construct(Settings $settings) {
    $this->settings = $settings;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('settings')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'config_backup_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $directory = $this->settings->get('config_backup_directory');
    if (empty($directory)) {
      $this->messenger()->addError($this->t('The backup directory configuration "config_backup_directory" not specified in settings.php file.'));
    }
    else {
      $directory_is_writable = is_writable($directory);
      if (!$directory_is_writable) {
        $this->messenger()->addError($this->t('The directory %directory is not writable.', ['%directory' => $directory]));
      }

      $info = $this->t('The backup directory: <b>%directory</b>', ['%directory' => $directory]);
      $form['info'] = [
        '#type' => 'markup',
        '#markup' => "<p>{$info}</p>",
        '#weight' => 0,
      ];
      $form['submit'] = [
        '#type' => 'submit',
        '#value' => $this->t('Backup'),
        '#weight' => 10,
      ];
    }
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $res = \Drupal::service('config_backup.service')->backup();
    if ($res) {
      $this->messenger()->addStatus($this->t('Saved to @file .', ['@file' => $res]));
    }
    else {
      $this->messenger()->addError($this->t('Something went wrong.'));
    }
  }

}
