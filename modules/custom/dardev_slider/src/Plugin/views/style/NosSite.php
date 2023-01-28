<?php

namespace Drupal\dardev_slider\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;
use Drupal\Component\Utility\Html;

/**
 * Style plugin to render each item in an ordered or unordered list.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "views_nos_site",
 *   title = @Translation("INRA Site Thematique"),
 *   help = @Translation("Displays rows in Site Thematique"),
 *   theme = "views_nos_site",
 *   theme_file = "/../views_slider.theme.inc",
 *   display_types = {"normal"}
 * )
 */
class NosSite extends StylePluginBase {
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
    $options['card_title_field'] = ['default' => NULL];
    $options['card_url_field'] = ['default' => NULL];
    $options['card_image_field'] = ['default' => NULL];
    return $options;
  }

  /**
   * Render the given style.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    if (isset($form['grouping'])) {
      unset($form['grouping']);
      $form['card_title_field'] = [
        '#type' => 'select',
        '#title' => $this->t('title'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['card_title_field'],
        '#description' => $this->t('Select the field that will be used for the card title.'),
      ];
      $form['card_url_field'] = [
        '#type' => 'select',
        '#title' => $this->t('url'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['card_content_field'],
        '#description' => $this->t('Select the field that will be used for the card content.'),
      ];
      $form['card_image_field'] = [
        '#type' => 'select',
        '#title' => $this->t('logo'),
        '#options' => $this->displayHandler->getFieldLabels(TRUE),
        '#required' => TRUE,
        '#default_value' => $this->options['card_image_field'],
        '#description' => $this->t('Select the field that will be used for the card image.'),
      ];
    }
  }

}
