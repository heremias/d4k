<?php

namespace Drupal\k8s\Service\K8sClientExtension\Models;

use Maclof\Kubernetes\Models\Model;

/**
 * K8s cluster roles model.
 */
class K8sClusterRoleModel extends Model {

  /**
   * The api version.
   *
   * @var string
   */
  protected $apiVersion = 'rbac.authorization.k8s.io/v1';

}
