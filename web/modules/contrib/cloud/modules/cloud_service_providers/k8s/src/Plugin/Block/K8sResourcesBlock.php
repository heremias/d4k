<?php

namespace Drupal\k8s\Plugin\Block;

use Drupal\cloud\Traits\ResourceBlockTrait;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a resource block.
 *
 * @Block(
 *   id = "k8s_resources_block",
 *   admin_label = @Translation("K8s Resources"),
 *   category = @Translation("K8s")
 * )
 */
class K8sResourcesBlock extends K8sBaseBlock {

  use ResourceBlockTrait;

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['cloud_context'] = [
      '#type' => 'select',
      '#title' => $this->t('Cloud Service Provider'),
      '#description' => $this->t('Select cloud service provider.'),
      '#options' => $this->getCloudConfigs($this->t('All K8s providers'), 'k8s'),
      '#default_value' => $config['cloud_context'] ?? '',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['cloud_context'] = $form_state->getValue('cloud_context');
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'cloud_context' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $cloud_configs = $this->getCloudConfigs($this->t('All K8s providers'), 'k8s');
    $cloud_context = $this->configuration['cloud_context'];
    $cloud_context_name = empty($cloud_context)
      ? 'all K8s providers'
      : $cloud_configs[$cloud_context];

    $build = [];
    $build['resources'] = [
      '#type' => 'details',
      '#title' => $this->t('Resources'),
      '#open' => TRUE,
    ];
    $build['resources']['description'] = [
      '#markup' => $this->t(
        'You are using the following K8s resources in %cloud_context_name:',
        ['%cloud_context_name' => $cloud_context_name]
      ),
    ];

    $build['resources']['resource_table'] = $this->buildResourceTable();
    return $build;
  }

  /**
   * Build a resource HTML table.
   *
   * @return array
   *   Table array.
   */
  private function buildResourceTable() {
    $resources = [
      'k8s_node' => [
        'view any k8s node',
        [],
      ],
      'k8s_namespace' => [
        'view any k8s namespace',
        [],
      ],
      'k8s_deployment' => [
        'view any k8s deployment',
        [],
      ],
      'k8s_pod' => [
        'view any k8s pod',
        [],
      ],
      'k8s_replica_set' => [
        'view any k8s replica set',
        [],
      ],
      'k8s_cron_job' => [
        'view any k8s cron job',
        [],
      ],
      'k8s_job' => [
        'view any k8s job',
        [],
      ],
      'k8s_service' => [
        'view any k8s service',
        [],
      ],
      'k8s_network_policy' => [
        'view any k8s network policy',
        [],
      ],
      'k8s_resource_quota' => [
        'view any k8s resource quota',
        [],
      ],
      'k8s_limit_range' => [
        'view any k8s limit range',
        [],
      ],
      'k8s_config_map' => [
        'view any k8s configmap',
        [],
      ],
      'k8s_secret' => [
        'view any k8s secret',
        [],
      ],
      'k8s_role' => [
        'view any k8s role',
        [],
      ],
      'k8s_role_binding' => [
        'view any k8s role binding',
        [],
      ],
      'k8s_cluster_role' => [
        'view any k8s cluster role',
        [],
      ],
      'k8s_cluster_role_binding' => [
        'view any k8s cluster role bindings',
        [],
      ],
      'k8s_persistent_volume' => [
        'view any k8s persistent volume',
        [],
      ],
      'k8s_persistent_volume_claim' => [
        'view any k8s persistent volume claim',
        [],
      ],
      'k8s_storage_class' => [
        'view any k8s storage class',
        [],
      ],
      'k8s_stateful_set' => [
        'view any k8s stateful set',
        [],
      ],
      'k8s_ingress' => [
        'view any k8s ingress',
        [],
      ],
      'k8s_daemon_set' => [
        'view any k8s daemon set',
        [],
      ],
      'k8s_endpoint' => [
        'view any k8s endpoint',
        [],
      ],
      'k8s_event' => [
        'view any k8s event',
        [],
      ],
      'k8s_api_service' => [
        'view any k8s api service',
        [],
      ],
      'k8s_service_account' => [
        'view any k8s service account',
        [],
      ],
      'k8s_priority_class' => [
        'view any k8s priority class',
        [],
      ],
    ];

    $rows = $this->buildResourceTableRows($resources);

    return [
      '#type' => 'table',
      '#rows' => $rows,
    ];
  }

}
