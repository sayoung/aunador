<?php
/**
 * @file
 * Contains \Drupal\md_user\Controller\UserController.
 */

namespace Drupal\md_user\Controller;

use Drupal\Core\Controller\ControllerBase;

class UserController extends ControllerBase
{
    public function getUser()
    {
		$lang_code = \Drupal::languageManager()->getCurrentLanguage()->getId();
        $query = \Drupal::entityQuery('node');
        $query->condition('type', 'team');
        $query->condition('status', 1);
		$query->condition('langcode', $lang_code);
        $query->sort('field_categorie_auer');
        $nids = $query->execute();
        $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

        return array(
          '#theme' => 'theme_md_user_page',
          '#nodes' => $nodes,
		  '#cur_lang' => $lang_code,
          '#cache' => [
                'max-age' => 0,
                 ],
	         '#attached' => array(
           'library' => array(
            'md_user/md-user-hp'
              )
          )
    );
    }
}
