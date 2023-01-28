<?php

namespace Drupal\required_api\Plugin\Required;

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Field\FieldDefinitionInterface;

/**
 * Default required plugin using core implementation.
 *
 * @Required(
 *   id = "default",
 *   label = @Translation("Core"),
 *   description = @Translation("Required based on core implementation.")
 * )
 */
class RequiredDefault extends RequiredBase {

  /**
   * {@inheritdoc}
   */
  public function isRequired(FieldDefinitionInterface $field, AccountInterface $account) {
    return $field->isRequired();
  }

  /**
   * {@inheritdoc}
   */
  public function requiredFormElement(FieldDefinitionInterface $field) {

    $element = [
      '#type' => 'checkbox',
      '#title' => $this->t('Required field'),
      '#default_value' => $field->isRequired(),
      '#weight' => -5,
    ];

    return $element;
  }

}
