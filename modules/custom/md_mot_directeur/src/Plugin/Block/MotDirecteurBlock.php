<?php

namespace Drupal\md_mot_directeur\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'MotDirecteur' block.
 *
 * @Block(
 *  id = "md_mot_directeur_block",
 *  admin_label = @Translation("Mot Directeur Block"),
 * )
 */
class MotDirecteurBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $query = \Drupal::entityQuery('node');
    $query->condition('type', 'mot_du_directeur');
    $query->condition('status', 1);
    $query->sort('created', 'desc');
    $query->range(0, 1);
    $nids = $query->execute();
    $mots = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);
	  
    
    return array(
      '#theme' => 'theme_md_mot_directeur',
      '#mots' => $mots,
	  '#cache' => [
          'max-age' => 0,
      ],
	  	  '#attached' => array(
                'library' => array(
                    'md_mot_directeur/md-mot-directeur'
                )
            )
    );
  }

}
