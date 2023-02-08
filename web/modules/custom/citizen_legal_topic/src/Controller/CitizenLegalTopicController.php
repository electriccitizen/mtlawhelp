<?php

namespace Drupal\citizen_legal_topic\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
use Laminas\Diactoros\Response\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Returns responses for Citizen Legal Topic routes.
 */
class CitizenLegalTopicController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function legalTermAutocomplete(Request $request) {
    $tempStore = \Drupal::service('tempstore.private')->get('legal_topic');
    $parent = $tempStore->get('parent') ?? 0;
    $node = Node::load($parent);
    $parent_term = $node ? $node->get('field_legal_topic')->getValue()[0]['citizen_legal_topic_target_id'] : 0;
    $terms = [];
      $tree = $this->entityTypeManager()->getStorage('taxonomy_term')->loadTree('legal_topics', $parent_term, 1);
      foreach ($tree as $term) {
        $terms[] = [
          'value' => $term->tid,
          'label' => $term->name,
        ];
      }
    return new JsonResponse($terms);
  }

  /**
   * This function is called by the route when an AJAX request sends the NID
   * of a parent topic.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   * @param $nid
   *
   * @return void
   */
  public function setParentTerm(Request $request, $nid) {
    $tempStore = \Drupal::service('tempstore.private')->get('legal_topic');
    $tempStore->set('parent', $nid);
    return new Response();
  }

}
