<?php

namespace Drupal\citizen_legal_topic\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Defines the 'citizen_legal_topic_field' field type.
 *
 * @FieldType(
 *   id = "citizen_legal_topic_field",
 *   label = @Translation("Legal Topic"),
 *   category = @Translation("General"),
 *   default_widget = "citizen_legal_topic_field",
 *   default_formatter = "citizen_legal_topic_field_default"
 * )
 */
class LegalTopicItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    if ($this->citizen_legal_topic_target_id !== NULL) {
      return FALSE;
    }
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {

    $properties['citizen_legal_topic_target_id'] = DataDefinition::create('integer')
      ->setLabel(t('citizen_legal_topic_target_id'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function getConstraints() {
    $constraints = parent::getConstraints();

    $options['citizen_legal_topic_target_id']['NotBlank'] = [];

    $constraint_manager = \Drupal::typedDataManager()->getValidationConstraintManager();
    $constraints[] = $constraint_manager->create('ComplexData', $options);
    // @todo Add more constraints here.
    return $constraints;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {

    $columns = [
      'citizen_legal_topic_target_id' => [
        'type' => 'int',
        'size' => 'normal',
      ],
    ];

    $schema = [
      'columns' => $columns,
      // @DCG Add indexes here if necessary.
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public static function generateSampleValue(FieldDefinitionInterface $field_definition) {

    $values['citizen_legal_topic_target_id'] = mt_rand(-1000, 1000);

    return $values;
  }

}
