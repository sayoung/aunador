<?php
/**
 * @file
 * Contains \Drupal\md_publication\Controller\PubsController.
 */

namespace Drupal\md_publication\Controller;

use Drupal\Core\Controller\ControllerBase;

class PubsController extends ControllerBase
{
    public function getPubs()
    {
		$lang_code = \Drupal::languageManager()->getCurrentLanguage()->getId();
        $query = \Drupal::entityQuery('node');
        $query->condition('type', 'publication');
        $query->condition('status', 1);
        $query->sort('created', 'desc');
		$query->condition('langcode', $lang_code);
        $nids = $query->execute();
        $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

        return array(
          '#theme' => 'theme_md_publication_page',
          '#nodes' => $nodes,
		  '#cur_lang' => $lang_code,
	      '#attached' => array(
                    'library' => array(
                     'md_publication/md-pub-page'
                            )
                  )
    );
    }
}
