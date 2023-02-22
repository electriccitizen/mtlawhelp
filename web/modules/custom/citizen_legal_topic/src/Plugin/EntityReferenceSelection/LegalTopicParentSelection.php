<?php

namespace Drupal\citizen_legal_topic\Plugin\EntityReferenceSelection;

use Drupal\node\Plugin\EntityReferenceSelection\NodeSelection;

/**
 * Plugin description.
 *
 * @EntityReferenceSelection(
 *   id = "legal_topic_parent_selection",
 *   label = @Translation("Legal Topic Parent Selection"),
 *   group = "legal_topic_parent_selection",
 *   entity_types = {"node"},
 *   weight = 0
 * )
 */
class LegalTopicParentSelection extends NodeSelection {

  /**
   * {@inheritdoc}
   */
  protected function buildEntityQuery($match = NULL, $match_operator = 'CONTAINS') {
    $query = parent::buildEntityQuery($match, $match_operator);

    // Only return nodes representing parent topics.
    $query->condition('field_topic_type', 'parent');

    return $query;
  }

}
