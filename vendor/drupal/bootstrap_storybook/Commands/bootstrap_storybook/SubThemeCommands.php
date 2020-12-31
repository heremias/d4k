<?php

declare(strict_types = 1);

namespace Drush\Commands\bootstrap_storybook;

use Consolidation\AnnotatedCommand\CommandData;
use Consolidation\AnnotatedCommand\CommandError;
use Drupal\Component\Utility\UrlHelper;
use Drupal\bootstrap_storybook\SubThemeGenerator;
use Drush\Commands\DrushCommands;
use Exception;
use FilesystemIterator;
use Robo\Contract\BuilderAwareInterface;
use Robo\State\Data as RoboStateData;
use Robo\TaskAccessor;
use Symfony\Component\Filesystem\Filesystem;

use Robo\Task\Archive\loadTasks as ArchiveTaskLoader;
use Robo\Task\Filesystem\loadTasks as FilesystemTaskLoader;
use Symfony\Component\Finder\Finder;

/**
 *
 */
class SubThemeCommands extends DrushCommands implements BuilderAwareInterface {

  use TaskAccessor;
  use ArchiveTaskLoader;
  use FilesystemTaskLoader;

  /**
   * @var \Drupal\bootstrap_storybook\SubThemeGenerator
   */
  protected $subThemeCreator;

  /**
   * @var \Symfony\Component\Filesystem\Filesystem
   */
  protected $fs;

  /**
   * {@inheritdoc}
   */
  public function __construct(?SubThemeGenerator $subThemeCreator = NULL, ?Filesystem $fs = NULL) {
    $this->subThemeCreator = $subThemeCreator ?: new SubThemeGenerator();
    $this->fs = $fs ?: new Filesystem();

    parent::__construct();
  }

  /**
   * Creates a bootstrap_storybook sub-theme.
   *
   * @command bootstrap_storybook:create
   * @aliases bootstrap_storybook
   *
   * @bootstrap full
   *
   * @option string $machine-name
   *   The machine-readable name of your sub-theme. This will be auto-generated
   *   from the human-readable name if omitted.
   * @option string $description
   *   The description of your sub-theme
   * @option string $destination
   *   The destination of your sub-theme.
   * @option string $kit
   *   The name or url of the starter kit to use.
   *
   * @usage drush bootstrap_storybook:create 'My Theme'
   *   Creates a bootstrap_storybook sub-theme called "My Theme", using the default options.
   * @usage drush bootstrap_storybook:create 'My Theme' --machine_name=my_theme
   *   Creates a bootstrap_storybook sub-theme called "My Theme" with a specific machine name.
   *
   * @bootstrap_storybookArgLabel name
   * @bootstrap_storybookOptionMachineName machine-name
   */
  public function generateSubTheme(
    string $name,
    array $options = [
      'machine-name' => '',
      'description' => '',
      'destination' => '',
      'kit' => 'default',
    ]
  ) {
    $kit = $options['kit'];

    // @todo Use extension service.
    $bootstrap_storybookDir = drupal_get_path('theme', 'bootstrap_storybook');
    $srcDir = "$bootstrap_storybookDir/src/kits/{$kit}";

    // Find kit from other active themes.
    /** @var \Drupal\Core\Extension\Extension[] $themes */
    foreach (\Drupal::service('theme_handler')->listInfo() as $theme) {
      $path = "{$theme->getPath()}/src/kits/{$kit}";
      if ($this->fs->exists($path)) {
        $srcDir = $path;
      }
    }

    $dstDir = "{$options['destination']}/{$options['machine-name']}";

    $cb = $this->collectionBuilder();
    $cb->getState()->offsetSet('srcDir', $srcDir);

    if (UrlHelper::isValid($kit, TRUE)) {
      $kitUrl = $kit;
      $cb->addTask($this->taskTmpDir());

      $cb->addCode(function (RoboStateData $data) use ($kitUrl): int {
        $logger = $this->logger();
        $logger->debug(
          'download bootstrap_storybook starter kit from <info>{kitUrl}</info>',
          [
            'kitUrl' => $kitUrl,
          ]
        );

        $fileName = $this->getFileNameFromUrl($kitUrl);
        $packDir = "{$data['path']}/pack";
        $data['packPath'] = "$packDir/$fileName";

        try {
          $this->fs->mkdir($packDir);
          $this->fs->copy($kitUrl, $data['packPath']);
        }
        catch (Exception $e) {
          $logger->error($e->getMessage());

          return 1;
        }

        return 0;
      });

      $cb->addCode(function (RoboStateData $data): int {
        $logger = $this->logger();
        $logger->debug(
          'extract downloaded bootstrap_storybook starter kit from <info>{packPath}</info> to <info>{srcDir}</info>',
          [
            'packPath' => $data['packPath'],
            'srcDir' => $data['srcDir'],
          ]
        );

        $data['srcDir'] = "{$data['path']}/kit";

        /** @var \Drupal\Core\Archiver\ArchiverManager $extractorManager */
        $extractorManager = \Drupal::service('plugin.manager.archiver');

        try {
          /** @var \Drupal\Core\Archiver\ArchiverInterface $extractorInstance */
          $extractorInstance = $extractorManager->getInstance(['filepath' => $data['packPath']]);
          $extractorInstance->extract($data['srcDir']);
        }
        catch (Exception $e) {
          $this->logger()->error($e->getMessage());

          return 1;
        }

        $topLevelDir = $this->getTopLevelDir($data['srcDir']);
        if ($topLevelDir) {
          $data['srcDir'] = $topLevelDir;
        }

        return 0;
      });
    }

    $cb->addCode(function (RoboStateData $data) use ($dstDir): int {
      $logger = $this->logger();
      $logger->debug(
        'copy bootstrap_storybook starter kit from <info>{srcDir}</info> to <info>{dstDir}</info>',
        [
          'srcDir' => $data['srcDir'],
          'dstDir' => $dstDir,
        ]
      );

      try {
        $this->fs->mirror($data['srcDir'], $dstDir);
      }
      catch (Exception $e) {
        $this->logger()->error($e->getMessage());

        return 1;
      }

      return 0;
    });

    $cb->addCode(function () use ($name, $options, $dstDir): int {
      $logger = $this->logger();
      $logger->debug(
        'customize bootstrap_storybook starter kit in <info>{dstDir}</info> directory',
        [
          'dstDir' => $dstDir,
        ]
      );

      $this
        ->subThemeCreator
        ->setDir($dstDir)
        ->setMachineName($options['machine-name'])
        ->setName($name)
        ->setDescription($options['description'])
        ->generate();

      return 0;
    });

    return $cb;
  }

  /**
   * @hook validate bootstrap_storybook:create
   */
  public function onHookValidatebootstrap_storybookGenerateSubTheme(CommandData $commandData): ?CommandError {
    $input = $commandData->input();

    if (!$input->getOption('kit')) {
      $input->setOption('kit', 'default');
    }

    if (!$input->getOption('description')) {
      $input->setOption('description', $this->getDefaultDescription());
    }

    $machineName = $input->getOption('machine-name');
    if (!$machineName) {
      $machineName = $this->convertLabelToMachineName($input->getArgument('name'));
      $input->setOption('machine-name', $machineName);
    }

    $destination = $input->getOption('destination');
    if (!$destination) {
      $destination = $this->getDefaultDestination();
      $input->setOption('destination', $destination);
    }

    $dstDir = "$destination/$machineName";
    if ($this->fs->exists($dstDir) && !$this->isDirEmpty($dstDir)) {
      return new CommandError("Destination directory '$dstDir' not empty", 1);
    }

    return NULL;
  }

  /**
   * @hook validate @bootstrap_storybookArgLabel
   *
   * @return null|\Consolidation\AnnotatedCommand\CommandError
   */
  public function onHookValidatebootstrap_storybookArgLabel(CommandData $commandData): ?CommandError {
    $annotationKey = 'bootstrap_storybookArgLabel';
    $annotationData = $commandData->annotationData();
    if (!$annotationData->has($annotationKey)) {
      return NULL;
    }

    $commandErrors = [];
    $argNames = $this->parseMultiValueAnnotation($annotationData->get($annotationKey));
    foreach ($argNames as $argName) {
      $commandErrors[] = $this->onHookValidatebootstrap_storybookArgLabelSingle($commandData, $argName);
    }

    return $this->aggregateCommandErrors($commandErrors);
  }

  /**
   *
   */
  protected function onHookValidatebootstrap_storybookArgLabelSingle(CommandData $commandData, string $argName): ?CommandError {
    $label = $commandData->input()->getArgument($argName);
    if (strlen($label) === 0) {
      return NULL;
    }

    if (!preg_match('/^[^\t\r\n]+$/ui', $label)) {
      return new CommandError("Tabs and new line characters are not allowed in argument '$argName'.");
    }

    return NULL;
  }

  /**
   * @hook validate @bootstrap_storybookOptionMachineName
   */
  public function onHookValidatebootstrap_storybookOptionMachineName(CommandData $commandData) {
    $annotationKey = 'bootstrap_storybookOptionMachineName';
    $annotationData = $commandData->annotationData();
    if (!$annotationData->has($annotationKey)) {
      return NULL;
    }

    $commandErrors = [];
    $optionNames = $this->parseMultiValueAnnotation($annotationData->get($annotationKey));
    foreach ($optionNames as $optionName) {
      $commandErrors[] = $this->onHookValidatebootstrap_storybookOptionMachineNameSingle($commandData, $optionName);
    }

    return $this->aggregateCommandErrors($commandErrors);
  }

  /**
   *
   */
  protected function onHookValidatebootstrap_storybookOptionMachineNameSingle(CommandData $commandData, $optionName): ?CommandError {
    $machineNames = $commandData->input()->getOption($optionName);
    if (!is_array($machineNames)) {
      $machineNames = strlen($machineNames) !== 0 ? [$machineNames] : [];
    }

    $invalidMachineNames = [];
    foreach ($machineNames as $machineName) {
      if (!preg_match('/^[a-z][a-z0-9_]*$/', $machineName)) {
        $invalidMachineNames[] = $machineName;
      }
    }

    if ($invalidMachineNames) {
      return new CommandError("Following machine-names are invalid in option '$optionName': " . implode(', ', $invalidMachineNames));
    }

    return NULL;
  }

  /**
   *
   */
  protected function parseMultiValueAnnotation(string $value): array {
    return $this->explodeCommaSeparatedList($value);
  }

  /**
   *
   */
  protected function explodeCommaSeparatedList(string $items): array {
    return array_filter(
      preg_split('/\s*,\s*/', trim($items)),
      'mb_strlen'
    );
  }

  /**
   * @param \Consolidation\AnnotatedCommand\CommandError[] $commandErrors
   */
  protected function aggregateCommandErrors(array $commandErrors): ?CommandError {
    $errorCode = 0;
    $messages = [];
    /** @var \Consolidation\AnnotatedCommand\CommandError $commandError */
    foreach (array_filter($commandErrors) as $commandError) {
      $messages[] = $commandError->getOutputData();
      $errorCode = max($errorCode, $commandError->getExitCode());
    }

    if ($messages) {
      return new CommandError(implode(PHP_EOL, $messages), $errorCode);
    }

    return NULL;
  }

  /**
   *
   */
  protected function convertLabelToMachineName(string $label): string {
    return mb_strtolower(preg_replace('/[^a-z0-9_]+/ui', '_', $label));
  }

  /**
   *
   */
  protected function getDefaultDestination(): string {
    if ($this->fs->exists('./themes/contrib') || $this->fs->exists('./themes/custom')) {
      return './themes/custom';
    }

    return './themes';
  }

  /**
   *
   */
  protected function getDefaultDescription(): string {
    return 'A theme based on bootstrap_storybook.';
  }

  /**
   *
   */
  protected function isDirEmpty(string $dir): bool {
    return !(new FilesystemIterator($dir))->valid();
  }

  /**
   *
   */
  protected function getDirectDescendants(string $dir): Finder {
    return (new Finder())
      ->in($dir)
      ->depth('0');
  }

  /**
   *
   */
  protected function getFileNameFromUrl(string $url): string {
    return pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_BASENAME);
  }

  /**
   *
   */
  protected function getTopLevelDir(string $parentDir): string {
    $directDescendants = $this->getDirectDescendants($parentDir);
    $iterator = $directDescendants->getIterator();
    $iterator->rewind();
    /** @var \Symfony\Component\Finder\SplFileInfo $firstFile */
    $firstFile = $iterator->current();
    if ($directDescendants->count() === 1 && $firstFile->isDir()) {
      return $firstFile->getPathname();
    }

    return '';
  }

}
