<?php

namespace Drupal\aws_cloudwatchlogs\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\aws_cloudwatchlogs\Services\CreateLogGroup;
use Drupal\aws_cloudwatchlogs\Services\Utility;
use Drupal\Core\Messenger\MessengerInterface;

/**
 * Form for creating new log group.
 */
class CreateLogGroupForm extends FormBase {

  /**
   * Object for service to create log group.
   *
   * @var object
   */
  protected $createLogGroupHandler;

  /**
   * Object for service defining generic utilities.
   *
   * @var object
   */
  protected $utility;

  /**
   * Messanger for showing drupal status messages.
   *
   * @var object
   */
  protected $messanger;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'aws_cloudwatchlogs_create_log_group_form';
  }

  /**
   * {@inheritdoc}
   */
  public function __construct(
    CreateLogGroup $createLogGroup,
    Utility $utility,
    MessengerInterface $messanger
  ) {
    $this->createLogGroupHandler = $createLogGroup;
    $this->utility = $utility;
    $this->messanger = $messanger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('aws_cloudwatchlogs.create_log_group'),
      $container->get('aws_cloudwatchlogs.utility'),
      $container->get('messenger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['log_group'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Log Group Name'),
      '#description' => $this->t("<p>Creates a log group with the specified name. You can create up to 20,000 log groups per account. <br />You must use the following guidelines when naming a log group:</p>
        <ul>
          <li>Log group names must be unique within a region for an AWS account.</li>
          <li>Log group names can be between 1 and 512 characters long.</li>
          <li>Log group names consist of the following characters: a-z, A-Z, 0-9, '_' (underscore), '-' (hyphen), '/' (forward slash), '.' (period), and '#' (number sign)</li>
        </ul>
        Also, Log group created from this application will have tags appName as @appName <site name> and author information. This is usefull for filtering the log groups in the AWS Cloudwatchlogs and metrics.
        ", [
          '@appName' => $this->utility->getSiteName(),
        ]),
      '#required' => TRUE,
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Create Log Group'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $client = $this->createLogGroupHandler->getClient();
    $values = $form_state->getValues();
    $logGroupName = $values['log_group'];
    $groupTags = [
      'appName' => $this->utility->getSiteName(),
      'author' => $this->utility->getAccountEmail(),
    ];
    $createdGroup = $this->createLogGroupHandler->create($client, $logGroupName, $groupTags);
    if ($createdGroup != FALSE) {
      // Log group has been successfuly created.
      $this->messanger->addStatus($this->t('Log Group @logGroup successfuly created.', [
        '@logGroup' => $logGroupName,
      ]));
    }
  }

}
