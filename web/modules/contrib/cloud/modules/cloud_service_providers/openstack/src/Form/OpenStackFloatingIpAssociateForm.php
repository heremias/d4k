<?php

namespace Drupal\openstack\Form;

use Drupal\aws_cloud\Form\Ec2\ElasticIpAssociateForm;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Associate Floating IP address.
 */
class OpenStackFloatingIpAssociateForm extends ElasticIpAssociateForm {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('openstack.ec2'),
      $container->get('entity.repository'),
      $container->get('entity_type.bundle.info'),
      $container->get('datetime.time'),
      $container->get('messenger'),
      $container->get('entity_type.manager'),
      $container->get('cache.render'),
      $container->get('plugin.cache_clearer'),
      $container->get('entity.link_renderer'),
      $container->get('plugin.manager.cloud_config_plugin')
    );
  }

}
