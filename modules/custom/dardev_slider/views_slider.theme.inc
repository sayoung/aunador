<?php

/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

use Drupal\dardev_slider\ViewsSlider;
use Drupal\Core\Template\Attribute;


/**
 * Prepares variables for views cards templates.
 *
 * Default template: views-slider.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_slider(array &$vars) {
    $view = $vars['view'];
    $vars['id'] = ViewsSlider::getUniqueId($view);
  
    // card rows.
    $image = $view->style_plugin->options['card_image_field'];
    $title = $view->style_plugin->options['card_title_field'];
    $content = $view->style_plugin->options['card_content_field'];
  
    foreach ($vars['rows'] as $id => $row) {
      $vars['rows'][$id] = [];
      $vars['rows'][$id]['image'] = $view->style_plugin->getField($id, $image);
      $vars['rows'][$id]['title'] = $view->style_plugin->getField($id, $title);
      $vars['rows'][$id]['content'] = $view->style_plugin->getField($id, $content);
    }
  }

  function template_preprocess_views_nos_site(array &$vars) {
    $view = $vars['view'];
    $vars['id'] = ViewsSlider::getUniqueId($view);
  
    // card rows.
    $image = $view->style_plugin->options['card_image_field'];
    $title = $view->style_plugin->options['card_title_field'];
    $url = $view->style_plugin->options['card_url_field'];
  
    foreach ($vars['rows'] as $id => $row) {
      $vars['rows'][$id] = [];
      $vars['rows'][$id]['image'] = $view->style_plugin->getField($id, $image);
      $vars['rows'][$id]['title'] = $view->style_plugin->getField($id, $title);
      $vars['rows'][$id]['url'] = $view->style_plugin->getField($id, $url);
    }
  }