<?php

namespace Drupal\aws_cloudwatchlogs\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure AWS Cloudwatch logs settings for this site.
 */
class AwsCloudwatchLogSettingsForm extends ConfigFormBase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'aws_cloudwatchlogs.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'aws_cloudwatchlogs_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['basic_settings'] = [
      '#type' => 'details',
      '#title' => $this->t('Basic Settings'),
      '#open' => TRUE,
    ];

    $form['basic_settings']['region'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Region'),
      '#description' => $this->t('Region where your application is hosted in AWS.
        <p> For example: ap-south-1 for Asia Pacific (Mumbai) region </p>
        '),
      '#default_value' => $config->get('region'),
    ];

    $form['basic_settings']['version'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Version'),
      '#description' => $this->t('Version for which connection is needed.
        Leave to latest if not known.'),
      '#default_value' => $config->get('version'),
    ];

    $form['authentication'] = [
      '#type' => 'details',
      '#title' => $this->t('Cloudwatch Authentication'),
      '#description' => $this->t('The access key and secret of the IAM user with apt
        roles/permissions assign for AWS Cloudwatch connection.'),
      '#open' => TRUE,
    ];

    $form['authentication']['access_key'] = [
      '#type' => 'key_select',
      '#title' => $this->t('AWS Access Key'),
      '#empty_option' => $this->t('- Select -'),
      '#default_value' => $config->get('access_key'),
    ];

    $form['authentication']['secret'] = [
      '#type' => 'key_select',
      '#title' => $this->t('AWS Secret Key'),
      '#empty_option' => $this->t('- Select -'),
      '#default_value' => $config->get('secret'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $config = $this->configFactory->getEditable(static::SETTINGS);
    $config->set('region', $form_state->getValue('region'));
    $config->set('version', $form_state->getValue('version'));
    $config->set('access_key', $form_state->getValue('access_key'));
    $config->set('secret', $form_state->getValue('secret'));
    $config->save();

    parent::submitForm($form, $form_state);
  }

}
