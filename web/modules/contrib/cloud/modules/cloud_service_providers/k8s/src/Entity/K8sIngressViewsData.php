<?php

namespace Drupal\k8s\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides the views data for the Ingress entity type.
 */
class K8sIngressViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['k8s_ingress']['ingress_bulk_form'] = [
      'title' => $this->t('Ingress operations bulk form'),
      'help' => $this->t('Add a form element that lets you run operations on multiple Ingresses.'),
      'field' => [
        'id' => 'ingress_bulk_form',
      ],
    ];

    return $data;
  }

}
