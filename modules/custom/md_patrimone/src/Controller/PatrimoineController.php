<?php
/**
 * @file
 * Contains \Drupal\md_patrimone\Controller\PatrimoineController.
 */

namespace Drupal\md_patrimone\Controller;

use Drupal\Core\Controller\ControllerBase;

class PatrimoineController extends ControllerBase
{
    public function getPatrimoine()
    {
		$lang_code = \Drupal::languageManager()->getCurrentLanguage()->getId();
        $query = \Drupal::entityQuery('node');
        $query->condition('type', 'patrimoine');
        $query->condition('status', 1);
        $query->sort('created', 'desc');
		$query->condition('langcode', $lang_code);
        $nids = $query->execute();
        $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

        return array(
          '#theme' => 'theme_md_patrimones_page',
          '#nodes' => $nodes,
		  '#cur_lang' => $lang_code,
	      '#attached' => array(
                    'library' => array(
                     'md_patrimone/md-patrimoine-hp'
                            )
                  )
    );
    }
}
