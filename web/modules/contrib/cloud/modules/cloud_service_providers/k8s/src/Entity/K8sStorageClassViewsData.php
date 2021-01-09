<?php

namespace Drupal\k8s\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides the views data for the Storage Class entity type.
 */
class K8sStorageClassViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['k8s_storage_class']['storage_class_bulk_form'] = [
      'title' => $this->t('Storage Class operations bulk form'),
      'help' => $this->t('Add a form element that lets you run operations on multiple Storage Classes.'),
      'field' => [
        'id' => 'storage_class_bulk_form',
      ],
    ];

    return $data;
  }

}
