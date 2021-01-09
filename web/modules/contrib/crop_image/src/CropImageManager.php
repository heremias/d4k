<?php

namespace Drupal\crop_image;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\crop_image\Entity\CropDuplicate;
use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\file\Plugin\Field\FieldType\FileFieldItemList;

class CropImageManager {

  /**
   * Constructs a CropImageManager object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   Entity type manager service.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, ConfigFactoryInterface $config_factory) {
    $this->entityTypeManager = $entity_type_manager;
    $this->cropStorage = $this->entityTypeManager->getStorage('crop');
    $this->cropDuplicateStorage = $this->entityTypeManager->getStorage('crop_duplicate');
    $this->imageStyleStorage = $this->entityTypeManager->getStorage('image_style');
    $this->fileStorage = $this->entityTypeManager->getStorage('file');
    $this->imageWidgetCropSettings = $config_factory->get('image_widget_crop.settings');
  }

  public function validateCropImages(EntityInterface $entity) {
    if (isset($entity) && $entity instanceof FieldableEntityInterface) {
      $field_crop_images = [];
      // Loop all fields of the entity going to get saved.
      foreach ($entity->getFields() as $entity_fields) {
        // If current field is FileField and use imageWidgetCrop.
        if ($entity_fields instanceof FileFieldItemList) {
          $field_name = $entity_fields->getName();
          $field_crop_images[$field_name] = [];
          /* First loop to get each elements independently in the field values.
          Required if the image field cardinality > 1. */
          $values = $entity_fields->getValue();
          $updated = FALSE;
          foreach ($values as $delta => $crop_elements) {
            $crop_duplicate = NULL;
            foreach ($crop_elements as $crop_element) {
              if (is_array($crop_element) && isset($crop_element['crop_wrapper'])) {

                // If file-id key is not available, set it same as parent elements target_id
                if (empty($crop_element['file-id']) && !empty($crop_elements['target_id'])) {
                  $crop_element['file-id'] = $crop_elements['target_id'];
                }

                $file_id = $crop_element['file-id'];
                if (!CropDuplicate::isDuplicate($file_id)) {
                  // Create duplicate image for cropping use.

                  /** @var \Drupal\file_entity\Entity\FileEntity $source_file */
                  $source_file = $this->fileStorage->load($file_id);
                  $params = [
                    'name' => t('Duplicate of @name (@id)', ['@name' => $source_file->label(), '@id' => $file_id]),
                    'source_file_id' => $source_file->id(),
                    'entity_type' => $entity->getEntityTypeId(),
                    'entity_uuid' => $entity->uuid(),
                    'field_name' => $field_name,
                    'field_delta' => $delta,
                  ];
                  $crop_duplicate = CropDuplicate::create($params);
                  $crop_duplicate->save();

                  $duplicate_file = $crop_duplicate->getDuplicateFile();
                  $crop_elements['target_id'] = $duplicate_file->id();
                  foreach ($crop_elements as $key => $crop_element) {
                    if (is_array($crop_element) && isset($crop_element['crop_wrapper'])) {
                      $crop_elements[$key]['file-uri'] = $duplicate_file->getFileUri();
                      $crop_elements[$key]['file-id'] = $duplicate_file->id();
                    }
                  }
                  $values[$delta] = $crop_elements;
                  $updated = TRUE;
                  $field_crop_images[$entity_fields->getName()][] = $duplicate_file->id();
                }
                else {
                  $crop_duplicate = CropDuplicate::getForDuplicateFile($file_id);
                  if ($crop_duplicate && !$crop_duplicate->matchUsage($entity->getEntityTypeId(), $entity->uuid(), $field_name)) {
                    // Somehow user seletecd crop images created for somewhere else.
                    $source_file = $crop_duplicate->getSourceFile();
                    $file_id = $source_file->id();
                    $params = [
                      'name' => t('Duplicate of @name (@id)', ['@name' => $source_file->label(), '@id' => $file_id]),
                      'source_file_id' => $source_file->id(),
                      'entity_type' => $entity->getEntityTypeId(),
                      'entity_uuid' => $entity->uuid(),
                      'field_name' => $field_name,
                      'field_delta' => $delta,
                    ];

                    $new_crop_duplicate = CropDuplicate::create($params);
                    $new_crop_duplicate->save();

                    $duplicate_file = $new_crop_duplicate->getDuplicateFile();
                    $crop_elements['target_id'] = $duplicate_file->id();
                    foreach ($crop_elements as $key => $crop_element) {
                      if (is_array($crop_element) && isset($crop_element['crop_wrapper'])) {
                        $crop_elements[$key]['file-uri'] = $duplicate_file->getFileUri();
                        $crop_elements[$key]['file-id'] = $duplicate_file->id();
                      }
                    }
                    $values[$delta] = $crop_elements;
                    $updated = TRUE;
                    $field_crop_images[$entity_fields->getName()][] = $duplicate_file->id();
                  }
                  else {
                    // Save existing crop duplicate images for processing later to determine for deletion.
                    $field_crop_images[$entity_fields->getName()][] = $file_id;
                  }
                }
              }
            }
          }

          if ($updated) {
            $entity_fields->setValue($values);
          }
        }
      }
      if (!$entity->isNew()) {
        $original = $entity->original;
        foreach ($field_crop_images as $field_name => $current_duplicate_file_ids) {
          $original_duplicate_file_ids = [];
          foreach ($original->$field_name->getValue() as $item) {
            $original_duplicate_file_ids[] = $item['target_id'];
          }
          $removed_duplicate_files = array_diff($original_duplicate_file_ids, $current_duplicate_file_ids);
          foreach ($removed_duplicate_files as $fid) {
            $crop_duplicate = CropDuplicate::getForDuplicateFile($fid);
            if ($crop_duplicate && $crop_duplicate->matchUsage($entity->getEntityTypeId(), $entity->uuid(), $field_name)) {
              // Make sure we are deleting crop duplicates by this entity.
              $crop_duplicate->delete();
            }
          }
        }
      }
    }
  }

  public function removeCropImages(EntityInterface $entity) {
    if (isset($entity) && $entity instanceof FieldableEntityInterface) {
      foreach (CropDuplicate::getCropDuplicatesForEntity($entity) as $crop_duplicate) {
        $crop_duplicate->delete();
      }
    }
  }
}