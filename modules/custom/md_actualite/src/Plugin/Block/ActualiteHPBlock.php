<?php

namespace Drupal\md_actualite\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ActualiteHPBlock' block.
 *
 * @Block(
 *  id = "md_actualite_hp_block",
 *  admin_label = @Translation("Actualite HP Block"),
 * )
 */
class ActualiteHPBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
$lang_code = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $query = \Drupal::entityQuery('node');
    $query->condition('type', 'actualites');
    $query->condition('status', 1);
    $query->condition('langcode', $lang_code);
    $query->sort('created', 'desc');
    $query->range(0, 5);
    $nids = $query->execute();
    $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

   // print_r($nodes);exit;

    return array(
      '#theme' => 'theme_md_actualite_hp',
      '#nodes' => $nodes,
      '#cur_lang' => $lang_code,
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
