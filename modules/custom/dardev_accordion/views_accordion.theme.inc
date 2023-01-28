<?php

/**
 * @file
 * Preprocessors and helper functions to make theming easier.
 */

use Drupal\dardev_accordion\ViewsAccordion;
use Drupal\Core\Template\Attribute;


/**
 * Prepares variables for views latest accordion templates.
 *
 * Default template: views-accordion-inra.html.twig.
 *
 * @param array $vars
 *   An associative array containing:
 *   - view: A ViewExecutable object.
 *   - rows: The raw row data.
 */
function template_preprocess_views_accordion_inra(array &$vars) {
    $view = $vars['view'];
    $vars['id'] = ViewsAccordion::getUniqueId($view);
  
    // card rows.

    $title = $view->style_plugin->options['title_field'];
    $url = $view->style_plugin->options['url_field'];
    $body = $view->style_plugin->options['body_field'];
    


  
    foreach ($vars['rows'] as $id => $row) {
      $vars['rows'][$id] = [];

      $vars['rows'][$id]['title'] = $view->style_plugin->getField($id, $title);
      $vars['rows'][$id]['url'] = $view->style_plugin->getField($id, $url);
      $vars['rows'][$id]['body'] = $view->style_plugin->getField($id, $body);
      $vars['rows'][$id]['contenu'] = $row;
     

    }
  }