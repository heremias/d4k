<?php

namespace Drupal\Tests\sfc\Kernel;

use Drupal\Core\Form\FormState;
use Drupal\KernelTests\KernelTestBase;

/**
 * Tests the basic behavior of simple components.
 *
 * @coversDefaultClass \Drupal\sfc\Plugin\SingleFileComponent\SimpleComponent
 *
 * @group sfc
 */
class SimpleComponentTest extends KernelTestBase {

  use ComponentTestTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'sfc',
    'sfc_test',
  ];

  /**
   * Tests that a simple component renders properly.
   */
  public function testRender() {
    $this->assertEquals('<div class="simple-test">Default value</div>', $this->renderComponent('simple_test', []));
    $this->assertEquals('<div class="simple-test">Click me</div>', $this->renderComponent('simple_test', [
      'message' => 'Click me',
    ]));
    // Test the output CSS/JS.
    /** @var \Drupal\Component\Plugin\PluginManagerInterface $manager */
    $manager = \Drupal::service('plugin.manager.single_file_component');
    $component = $manager->createInstance('simple_assets');
    $this->assertTrue($component->shouldWriteAssets());
    $component->writeAssets();
    $this->assertContains('foo/bar', $component->getLibrary()['dependencies']);
    $this->assertFileExists('public://sfc/components/simple_assets/simple_assets.css');
    $this->assertFileExists('public://sfc/components/simple_assets/simple_assets.js');
    $css = file_get_contents('public://sfc/components/simple_assets/simple_assets.css');
    $this->assertStringContainsString('.foo {', $css);
    $this->assertStringContainsString('background: url(/' . drupal_get_path('module', 'sfc_test') . '/assets/image.jpg)', $css);
    $js = file_get_contents('public://sfc/components/simple_assets/simple_assets.js');
    $this->assertStringContainsString("alert('foo');", $js);
    $this->assertStringContainsString("alert('bar');", $js);
    $this->assertStringContainsString("alert('baz');", $js);
    // Test an empty template.
    $this->assertEquals('', $this->renderComponent('simple_empty', []));
    // Test a hard to parse file.
    $component = $manager->createInstance('simple_parse');
    $component->writeAssets();
    $this->assertFileExists('public://sfc/components/simple_parse/simple_parse.js');
    $js = file_get_contents('public://sfc/components/simple_parse/simple_parse.js');
    $expected_js = "
  var foo = '<script>alert(`bar`)</script>';
  var template = '<template>baz</template>';

(function ($, Drupal, drupalSettings) {";
    $this->assertEquals($expected_js, substr($js, 0, strlen($expected_js)));
    $this->assertEquals("  <template>foo</template>
  bar
  <script>alert(`baz`)</script>", $this->renderComponent('simple_parse', []));
  }

  /**
   * Tests that form methods work as expected.
   */
  public function testForm() {
    /** @var \Drupal\Component\Plugin\PluginManagerInterface $manager */
    $manager = \Drupal::service('plugin.manager.single_file_component');
    $component = $manager->createInstance('simple_block');
    $form = [];
    $form_state = new FormState();
    $form = $component->buildContextForm($form, $form_state, []);
    $this->assertNotEmpty($form);
    $form['message']['#parents'] = [];
    $form_state->setValue('message', 'test');
    $component->validateContextForm($form, $form_state);
    $this->assertNotEmpty($form_state->hasAnyErrors());
    $form_state->setValue('message', 'changeme');
    $component->submitContextForm($form, $form_state);
    $this->assertEquals('changed', $form_state->getValue('message'));
  }

  /**
   * Tests that definition additions work as expected.
   */
  public function testDefinitionAdditions() {
    /** @var \Drupal\sfc\Plugin\Block\ComponentBlock $block */
    $block = \Drupal::service('plugin.manager.block')->createInstance('single_file_component_block:simple_block');
    $renderer = \Drupal::service('renderer');
    $build = $block->build();
    $render = $renderer->renderPlain($build);
    $this->assertEquals('<div class="simple-block">Default value</div>', $render);
  }

  /**
   * Tests that parsing complex templates works as expected.
   */
  public function testComplexTemplate() {
    /** @var \Drupal\Component\Plugin\PluginManagerInterface $manager */
    $manager = \Drupal::service('plugin.manager.single_file_component');
    $component = $manager->createInstance('simple_complex_template');
    $this->assertStringContainsString("<div{{ attributes.addClass('two-column') }}>
    <div{{ region_attributes.left.addClass('left') }}>
      {{ content.left }}
    </div>
    <div{{ region_attributes.right.addClass('right') }}>
      {{ content.right }}
    </div>
  </div>", $component->getTemplate());
  }

  /**
   * Tests that themes can provide components.
   */
  public function testThemeComponents() {
    \Drupal::service('theme_installer')->install(['sfc_test_theme']);
    /** @var \Drupal\Component\Plugin\PluginManagerInterface $manager */
    $manager = \Drupal::service('plugin.manager.single_file_component');
    $component = $manager->createInstance('theme_component');
    $this->assertStringContainsString("I'm from a theme!", $component->getTemplate());
  }

}
