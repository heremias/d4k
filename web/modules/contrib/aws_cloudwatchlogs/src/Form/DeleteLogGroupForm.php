<?php

namespace Drupal\aws_cloudwatchlogs\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\aws_cloudwatchlogs\Services\DeleteLogGroup;
use Drupal\aws_cloudwatchlogs\Services\DescribeLogGroups;
use Drupal\aws_cloudwatchlogs\Services\Utility;
use Drupal\Core\Messenger\MessengerInterface;

/**
 * Form for deleting log group.
 */
class DeleteLogGroupForm extends FormBase {

  /**
   * Object for service to deleting log group.
   *
   * @var object
   */
  protected $deleteLogGroupHandler;

  /**
   * Object for service to Describe log groups.
   *
   * @var object
   */
  protected $logGroups;

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
    return 'aws_cloudwatchlogs_delete_log_group_form';
  }

  /**
   * {@inheritdoc}
   */
  public function __construct(
    DescribeLogGroups $logGroups,
    deleteLogGroup $createLogGroup,
    Utility $utility,
    MessengerInterface $messanger
  ) {
    $this->logGroups = $logGroups;
    $this->deleteLogGroupHandler = $createLogGroup;
    $this->utility = $utility;
    $this->messanger = $messanger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('aws_cloudwatchlogs.describe_log_groups'),
      $container->get('aws_cloudwatchlogs.delete_log_group'),
      $container->get('aws_cloudwatchlogs.utility'),
      $container->get('messenger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $client = $this->logGroups->getClient();
    $logGroupOptions = [];

    // Options for log groups.
    $logGroupsList = $this->logGroups->getResult($client);
    if ($logGroupsList) {
      $logGroupOptions = $this->logGroups->getLogGroupNameOnly($logGroupsList);
    }

    $form['log_group'] = [
      '#type' => 'select',
      '#title' => $this->t('Log Group Name'),
      '#description' => $this->t('Deletes the selected log group and permanently deletes all the archived log events associated with the log group.'),
      '#options' => $logGroupOptions,
      '#required' => TRUE,
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Delete'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $client = $this->deleteLogGroupHandler->getClient();
    $values = $form_state->getValues();
    $logGroupName = $values['log_group'];

    $deletedGroupOutput = $this->deleteLogGroupHandler->delete($client, $logGroupName);
    if ($deletedGroupOutput != FALSE) {
      // Log group has been successfuly created.
      $this->messanger->addStatus($this->t('Log Group @logGroup successfuly deleted.', [
        '@logGroup' => $logGroupName,
      ]));
    }
  }

}
