<?php

namespace Drupal\Tests\component_blocks\Kernel;

use Drupal\KernelTests\KernelTestBase;

/**
 * Defines a class for testing component block discovery.
 *
 * @group component_blocks
 */
class ComponentBlockDiscoveryTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'component_blocks',
    'components',
    'block',
    'component_blocks_test',
    'entity_test',
    'ui_patterns',
    'ui_patterns_library',
    'system',
  ];

  /**
   * Tests discovery.
   */
  public function testDiscoveryAndDefaults() {
    $blocks = \Drupal::service('plugin.manager.block')->getDefinitions();
    $this->assertArrayHasKey('component_blocks:entity_test:test_component', $blocks);
  }

}
