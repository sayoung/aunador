<?php

namespace Drupal\dardev_accordion\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;
use Drupal\Component\Utility\Html;

/**
 * Style plugin to render each item in an ordered or unordered list.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_accordion_inra",
 *   title = @Translation("INRA  Accordion"),
 *   help = @Translation("Displays rows in a views  Accordion"),
 *   theme = "views_accordion_inra",
 *   theme_file = "/../views_accordion.theme.inc",
 *   display_types = {"normal"}
 * )
 */
class Accordion extends StylePluginBase {
  /**
   * Does the style plugin for itself support to add fields to it's output.
   *
   * @var bool
   */
  protected $usesFields = TRUE;

  /**
   * Does the style plugin allows to use style plugins.
   *
   * @var bool
   */
  protected $usesRowPlugin = TRUE;

  /**
   * Definition.
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['title_field'] = ['default' => NULL];
    $options['body_field'] = ['default' => NULL];
    $options['url_field'] = ['default' => NULL];

    return $options;
  }

  /**
   * Render the given style.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    if (isset($form['grouping'])) {
      unset($form['grouping']);
      $form['title_field'] = [
        '#type' => 'select',
        '#title' => $this->t('title field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['title_field'],
        '#description' => $this->t('Select the field that will be used for the title.'),
      ];

      $form['url_field'] = [
        '#type' => 'select',
        '#title' => $this->t('Url field'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['url_field'],
        '#description' => $this->t('Select the field that will be used for the content.'),
      ];
      
    }
  }


}