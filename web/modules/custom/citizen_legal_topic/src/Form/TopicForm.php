<?php

namespace Drupal\citizen_legal_topic\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

class TopicForm extends ContentEntityForm {

  public function validateForm(array &$form, FormStateInterface $form_state) {
    return parent::validateForm($form, $form_state); // TODO: Change the autogenerated stub
  }

}