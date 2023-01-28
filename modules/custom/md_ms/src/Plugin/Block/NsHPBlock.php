<?php

namespace Drupal\md_ms\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'NsHPBlock' block.
 *
 * @Block(
 *  id = "md_ns_hp_block",
 *  admin_label = @Translation("nos mission Block"),
 * )
 */
class NsHPBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
     $config = \Drupal::config("ms_custom.setting");
  $node_id =     $config->get('node_id_nm');
  $ns_title =     $config->get('ns_title');
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
      '#theme' => 'theme_md_ns_hp',
      '#nodes' => $nodes,
      '#ns_title' => $ns_title,
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
