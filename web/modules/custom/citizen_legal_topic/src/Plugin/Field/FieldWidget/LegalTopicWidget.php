<?php

namespace Drupal\citizen_legal_topic\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;

/**
 * Defines the 'citizen_legal_topic_field' field widget.
 *
 * @FieldWidget(
 *   id = "citizen_legal_topic_field",
 *   label = @Translation("Legal Topic"),
 *   field_types = {"citizen_legal_topic_field"},
 * )
 */
class LegalTopicWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $element['citizen_legal_topic_target_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Legal Topic'),
      '#default_value' => isset($items[$delta]->citizen_legal_topic_target_id) ? $items[$delta]->citizen_legal_topic_target_id : NULL,
      '#autocomplete_route_name' => 'citizen_legal_topic.subtopic.autocomplete',
      '#autocomplete_route_parameters' => ['parent_topic' => 0],
      '#autocomplete_route_options' => ['parent_tid' => 'banana'],
    ];

    $element['#theme_wrappers'] = ['container', 'form_element'];
    $element['#attributes']['class'][] = 'container-inline';
    $element['#attributes']['class'][] = 'citizen-legal-topic-field-elements';
    $element['#attached']['library'][] = 'citizen_legal_topic/citizen_legal_topic_field';

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function errorElement(array $element, ConstraintViolationInterface $violation, array $form, FormStateInterface $form_state) {
    return isset($violation->arrayPropertyPath[0]) ? $element[$violation->arrayPropertyPath[0]] : $element;
  }

  /**
   * {@inheritdoc}
   */
  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
    foreach ($values as $delta => $value) {
      if ($value['citizen_legal_topic_target_id'] === '') {
        $values[$delta]['citizen_legal_topic_target_id'] = NULL;
      }
    }
    return $values;
  }

}
