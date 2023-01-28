<?php

namespace Drupal\md_ms\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'MsHPBlock' block.
 *
 * @Block(
 *  id = "md_ms_hp_block",
 *  admin_label = @Translation("Mot de presedent Block"),
 * )
 */
class MsHPBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
     $config = \Drupal::config("ms_custom.setting");
  $node_id =     $config->get('node_id_ms');
  $ms_title =     $config->get('ms_title');
  $ms_image =     $config->get('ms_image');
$lang_code = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $query = \Drupal::entityQuery('node');
    $query->condition('status', 1);
    $query->condition('nid', $node_id);
    $query->condition('langcode', $lang_code);
    $query->sort('created', 'desc');
    $query->range(0, 1);
    $nids = $query->execute();
    $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

   // print_r($nodes);exit;

    return array(
      '#theme' => 'theme_md_ms_hp',
      '#nodes' => $nodes,
      '#ms_title' => $ms_title,
      '#ms_image' => $ms_image,
      '#cur_lang' => $lang_code,
	  '#cache' => [
          'max-age' => 0,
      ],
	  '#attached' => array(
                'library' => array(
                    'md_ms/md-ms-hp'
                )
            )
    );
  }

}
