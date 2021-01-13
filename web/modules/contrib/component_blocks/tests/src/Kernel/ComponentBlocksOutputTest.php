<?php

namespace Drupal\Tests\component_blocks\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\block\Traits\BlockCreationTrait;
use Drupal\Tests\node\Traits\ContentTypeCreationTrait;
use Drupal\Tests\node\Traits\NodeCreationTrait;
use Drupal\Tests\user\Traits\UserCreationTrait;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Defines a class for testing token integration.
 *
 * @group component_blocks
 */
class ComponentBlocksOutputTest extends KernelTestBase {

  use NodeCreationTrait;
  use UserCreationTrait;
  use ContentTypeCreationTrait;
  use BlockCreationTrait;

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'component_blocks',
    'components',
    'block',
    'component_blocks_test',
    'field',
    'entity_test',
    'ui_patterns',
    'ui_patterns_library',
    'ui_patterns_settings',
    'system',
    'node',
    'filter',
    'options',
    'text',
    'user',
    'system',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->installEntitySchema('node');
    $this->installConfig(['node', 'filter']);
    $this->installEntitySchema('user');
    $this->setUpCurrentUser([], ['access content']);
  }

  /**
   * Tests tokens.
   */
  public function testComponentBlock() {
    $block = $this->placeBlock('component_blocks:node:test_component', [
      'variant' => 'default',
      'variables' => [
        'subtitle' => [
          'source' => '__fixed',
          'value' => '[node:title]',
        ],
      ],
      'settings' => [
        'modifier' => 'Example modifier',
      ],
      'context_mapping' => [
        'entity' => '@component_blocks_test.context:node',
      ],
    ]);
    $this->createContentType(['type' => 'page']);
    $node = $this->createNode([
      'type' => 'page',
      'status' => 1,
      'title' => 'This & That',
    ]);
    \Drupal::service('component_blocks_test.context')->setNode($node);
    $builder = \Drupal::entityTypeManager()->getViewBuilder('block');
    $build = $builder->view($block, 'block');
    $output = \Drupal::service('renderer')->renderPlain($build);
    $crawler = new Crawler((string) $output);
    $title = $crawler->filter('.subtitle');
    $this->assertEquals(1, $title->count(), 'Subtitle is output');
    $this->assertStringContainsString('This &amp; That', $title->html());
    $modifier = $crawler->filter('.modifier');
    $this->assertEquals(1, $modifier->count(), 'Modifier is output');
    $this->assertStringContainsString('Example modifier', $modifier->html());

    $node = $this->createNode([
      'type' => 'page',
      'status' => 1,
      'title' => '<script type="text/javascript">alert("hi");</script>',
    ]);
    \Drupal::service('component_blocks_test.context')->setNode($node);
    $builder = \Drupal::entityTypeManager()->getViewBuilder('block');
    $build = $builder->view($block, 'block');
    $output = \Drupal::service('renderer')->renderPlain($build);
    $crawler = new Crawler((string) $output);
    $title = $crawler->filter('.subtitle');
    $this->assertEquals(1, $title->count(), 'Subtitle is output');
    $this->assertStringNotContainsString('<script', $title->html());
    $this->assertStringNotContainsString('</script>', $title->html());
  }

}
