<?php

namespace Drupal\sfc\Plugin\SingleFileComponent;

use Drupal\Core\Form\FormStateInterface;
use Drupal\sfc\ComponentBase;

/**
 * Contains a component that renders based on the contents of a .sfc file.
 *
 * @SingleFileComponent(
 *   id = "sfc_simple_component",
 *   deriver = "\Drupal\sfc\Plugin\Derivative\SimpleComponentDeriver",
 * )
 */
class SimpleComponent extends ComponentBase {

  /**
   * An array of file data.
   *
   * @var array
   */
  protected $fileData;

  /**
   * Loads, parses, and returns simple file data.
   *
   * @return array
   *   An array containing keys that match up with ComponentBase's constants.
   */
  protected function getFileData() {
    if (!empty($this->fileData)) {
      return $this->fileData;
    }
    // Require the file and store its output.
    $filename = $this->pluginDefinition['simple_file'];
    ob_start();
    require $filename;
    $content = ob_get_contents();
    ob_end_clean();
    // These default values mimic ComponentBase constants/methods.
    $new_data = [
      'JS' => NULL,
      'ATTACH' => NULL,
      'DETACH' => NULL,
      'CSS' => NULL,
      'TEMPLATE' => '',
      'SELECTOR' => NULL,
      'DEPENDENCIES' => NULL,
      'prepareContext' => NULL,
      'buildContextForm' => NULL,
      'validateContextForm' => NULL,
      'submitContextForm' => NULL,
    ];
    // Parse HTML content of file.
    $this->parseFileHtml($content, $new_data);
    // Parse variables set with PHP.
    if (isset($selector)) {
      $new_data['SELECTOR'] = $selector;
    }
    if (isset($dependencies)) {
      $new_data['DEPENDENCIES'] = $dependencies;
    }
    $callbacks = [
      'prepareContext',
      'buildContextForm',
      'validateContextForm',
      'submitContextForm',
    ];
    foreach ($callbacks as $callback) {
      if (isset($$callback) && is_callable($$callback)) {
        $new_data[$callback] = $$callback;
      }
    }
    $this->fileData = $new_data;
    return $this->fileData;
  }

  /**
   * Parses the HTML content of the .sfc file.
   *
   * @param string $content
   *   The HTML content of an .sfc file.
   * @param array $file_data
   *   The file data array.
   */
  protected function parseFileHtml($content, array &$file_data) {
    if (preg_match('/^<script>([\s\S]+?)^<\/script>/im', $content, $matches)) {
      $file_data['JS'] = $matches[1];
    }
    if (preg_match('/^<script[^>]*data-type="attach"[^>]*>([\s\S]+?)^<\/script>/im', $content, $matches)) {
      $file_data['ATTACH'] = $matches[1];
    }
    if (preg_match('/^<script[^>]*data-type="detach"[^>]*>([\s\S]+?)^<\/script>/im', $content, $matches)) {
      $file_data['DETACH'] = $matches[1];
    }
    if (preg_match('/^<style[^>]*>([\s\S]+?)^<\/style>/im', $content, $matches)) {
      $file_data['CSS'] = $matches[1];
    }
    if (preg_match('/^<template[^>]*>([\s\S]+?)^<\/template>/im', $content, $matches)) {
      $file_data['TEMPLATE'] = trim($matches[1], "\n");
    }
  }

  /**
   * {@inheritdoc}
   */
  public function prepareContext(array &$context) {
    $data = $this->getFileData();
    if ($data['prepareContext']) {
      $data['prepareContext']($context);
    }
  }

  /**
   * {@inheritdoc}
   */
  protected function getAttachmentData() {
    $data = $this->getFileData();
    return [
      'selector' => $this::SELECTOR ? $this::SELECTOR : $this->getFallBackSelector(),
      'attach' => $data['ATTACH'],
      'detach' => $data['DETACH'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function getCss() {
    return $this->replaceCssPaths($this->getFileData()['CSS']);
  }

  /**
   * {@inheritdoc}
   */
  protected function getJs() {
    return $this->getFileData()['JS'];
  }

  /**
   * {@inheritdoc}
   */
  protected function getDependencies() {
    return $this->getFileData()['DEPENDENCIES'];
  }

  /**
   * {@inheritdoc}
   */
  protected function getTemplateData() {
    return $this->getFileData()['TEMPLATE'];
  }

  /**
   * {@inheritdoc}
   */
  protected function getComponentFileName() {
    return $this->pluginDefinition['simple_file'];
  }

  /**
   * {@inheritdoc}
   */
  protected function hasDependencies() {
    return (bool) $this->getFileData()['DEPENDENCIES'];
  }

  /**
   * {@inheritdoc}
   */
  protected function hasAttachments() {
    $data = $this->getFileData();
    return $data['ATTACH'] || $data['DETACH'];
  }

  /**
   * {@inheritdoc}
   */
  protected function hasCss() {
    return (bool) $this->getFileData()['CSS'];
  }

  /**
   * {@inheritdoc}
   */
  protected function hasJs() {
    return (bool) $this->getFileData()['JS'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildContextForm(array $form, FormStateInterface $form_state, array $default_values = []) {
    if ($callback = $this->getFileData()['buildContextForm']) {
      $form = call_user_func($callback, $form, $form_state, $default_values);
    }
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateContextForm(array &$form, FormStateInterface $form_state) {
    if ($callback = $this->getFileData()['validateContextForm']) {
      call_user_func($callback, $form, $form_state);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitContextForm(array &$form, FormStateInterface $form_state) {
    if ($callback = $this->getFileData()['submitContextForm']) {
      call_user_func($callback, $form, $form_state);
    }
  }

}
