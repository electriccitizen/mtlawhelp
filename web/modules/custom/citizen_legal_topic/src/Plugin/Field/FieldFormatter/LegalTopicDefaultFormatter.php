<?php

namespace Drupal\citizen_legal_topic\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'citizen_legal_topic_field_default' formatter.
 *
 * @FieldFormatter(
 *   id = "citizen_legal_topic_field_default",
 *   label = @Translation("Default"),
 *   field_types = {"citizen_legal_topic_field"}
 * )
 */
class LegalTopicDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {

      if ($item->citizen_legal_topic_target_id) {
        $element[$delta]['citizen_legal_topic_target_id'] = [
          '#type' => 'item',
          '#title' => $this->t('citizen_legal_topic_target_id'),
          '#markup' => $item->citizen_legal_topic_target_id,
        ];
      }

    }

    return $element;
  }

}
