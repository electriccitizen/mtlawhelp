<?php

namespace Drupal\citizen_legal_topic\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Laminas\Diactoros\Response\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Returns responses for Citizen Legal Topic routes.
 */
class CitizenLegalTopicController extends ControllerBase {

  /**
   * Saves the value of the parent_topic field to temporary storage.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   * @param $nid
   *
   * @return void
   */
  public function setParentTerm(Request $request, $nid) {
    $tempStore = \Drupal::service('tempstore.private')->get('legal_topic');
    if ($nid == 0) {
      $tempStore->set('parent', 0);
      return new Response();
    }
    $tempStore->set('parent', $nid);
    return new Response();
  }

}
