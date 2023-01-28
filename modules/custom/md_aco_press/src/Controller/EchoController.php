<?php
/**
 * @file
 * Contains \Drupal\md_aco_press\Controller\EchoController.
 */

namespace Drupal\md_aco_press\Controller;

use Drupal\Core\Controller\ControllerBase;

class EchoController extends ControllerBase
{
    public function getEco()
    {
		$lang_code = \Drupal::languageManager()->getCurrentLanguage()->getId();
        $query = \Drupal::entityQuery('node');
        $query->condition('type', 'eco_presse');
        $query->condition('status', 1);
        $query->sort('created', 'desc');
		$query->condition('langcode', $lang_code);
        $nids = $query->execute();
        $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

        return array(
          '#theme' => 'theme_md_aco_presss_page',
          '#nodes' => $nodes,
		  '#cur_lang' => $lang_code,
	      '#attached' => array(
                    'library' => array(
                     'md_aco_press/md-press-hp'
                            )
                  )
    );
    }
}
