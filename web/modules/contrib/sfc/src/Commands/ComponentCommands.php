<?php

namespace Drupal\sfc\Commands;

use Consolidation\SiteAlias\SiteAliasManagerAwareTrait;
use Drupal\Component\Plugin\PluginManagerInterface;
use Drush\Commands\DrushCommands;
use Drush\SiteAlias\SiteAliasManagerAwareInterface;

/**
 * Drush command file for SFC commands.
 */
class ComponentCommands extends DrushCommands implements SiteAliasManagerAwareInterface {

  use SiteAliasManagerAwareTrait;

  /**
   * The plugin manager.
   *
   * @var \Drupal\Component\Plugin\PluginManagerInterface
   */
  protected $manager;

  /**
   * ComponentCommands constructor.
   *
   * @param \Drupal\Component\Plugin\PluginManagerInterface $manager
   *   The plugin manager.
   */
  public function __construct(PluginManagerInterface $manager) {
    $this->manager = $manager;
  }

  /**
   * Writes the assets and/or source for a given component.
   *
   * @param string $id
   *   The plugin ID.
   *
   * @command sfc:write
   */
  public function write($id) {
    /** @var \Drupal\sfc\ComponentInterface $component */
    $component = $this->manager->createInstance($id);
    $component->writeAssets();
  }

  /**
   * Watches for changes in all components.
   *
   * This is a good alternative to disabling the "data" cache bin for normal
   * components.
   *
   * @param array $options
   *   Options for this command.
   *
   * @command sfc:watch
   * @option run-once If the command should only be run once.
   */
  public function watch(array $options = ['run-once' => FALSE]) {
    $definitions = $this->manager->getDefinitions();
    if (empty($definitions)) {
      $this->io()->warning('No components found.');
      return 0;
    }
    $this->io()->writeln('Watching for changes...');
    while (TRUE) {
      clearstatcache();
      foreach (array_keys($definitions) as $id) {
        /** @var \Drupal\sfc\ComponentInterface $component */
        $component = $this->manager->createInstance($id);
        if ($component->shouldWriteAssets()) {
          $this->io()->writeln("Writing change for $id");
          $this->processManager()->drush($this->siteAliasManager()->getSelf(), 'sfc:write', [$id])->mustRun();
        }
      }
      usleep(250000);
      if ($options['run-once']) {
        break;
      }
    }
    return 1;
  }

}
