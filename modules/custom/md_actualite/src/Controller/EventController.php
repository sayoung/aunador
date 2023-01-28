<?php
/**
 * @file
 * Contains \Drupal\md_actualite\Controller\EventController.
 */

namespace Drupal\md_actualite\Controller;

use Drupal\Core\Controller\ControllerBase;

class EventController extends ControllerBase
{
    public function getActualites()
    {
        $query = \Drupal::entityQuery('node');
        $query->condition('type', 'actualites');
        $query->condition('status', 1);
        $query->sort('created', 'desc');
        $nids = $query->execute();
        $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

        return array(
          '#theme' => 'theme_md_actualites_page',
          '#nodes' => $nodes,
          '#cache' => [
                'max-age' => 0,
                 ],
	         '#attached' => array(
           'library' => array(
            'md_actualite/md-actualites-hp'
              )
          )
    );
    }
}
