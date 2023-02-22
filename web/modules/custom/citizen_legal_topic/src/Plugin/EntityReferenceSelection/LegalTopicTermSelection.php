<?php

namespace Drupal\citizen_legal_topic\Plugin\EntityReferenceSelection;

use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
use Drupal\taxonomy\Plugin\EntityReferenceSelection\TermSelection;

/**
 * Plugin description.
 *
 * @EntityReferenceSelection(
 *   id = "legal_topic_selection",
 *   label = @Translation("Legal Topic Selection"),
 *   group = "legal_topic_selection",
 *   entity_types = {"taxonomy_term"},
 *   weight = 0
 * )
 */
class LegalTopicTermSelection extends TermSelection {

  /**
   * {@inheritdoc}
   *
   * Pulls the value of the parent_topic field from temporary storage to use
   * as a condition in the query to limit autocomplete results.
   *
   */
  protected function buildEntityQuery($match = NULL, $match_operator = 'CONTAINS') {
    // Build the base query.
    $query = parent::buildEntityQuery($match, $match_operator);
    // Retrieve the legal_topic store.
    $store = \Drupal::service('tempstore.private')->get('legal_topic');
    // Get the nid of the parent topic node.
    $parent_topic_node_nid = $store->get('parent') ?? 0;
    // Load the parent topic node.
    $parent_topic_node = Node::load($parent_topic_node_nid);
    // Get the parent node's tid
    $parent_tid = $parent_topic_node ? $parent_topic_node->get('field_legal_topic')->getValue()[0]['target_id'] : 0;
    // Add the condition to the query.
    $query->condition('parent', $parent_tid);

    return $query;
  }

}
