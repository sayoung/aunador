<?php

namespace Drupal\md_ms\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'PubHPBlock' block.
 *
 * @Block(
 *  id = "md_ms_geo_block",
 *  admin_label = @Translation("Geo Block"),
 * )
 */
class PubHPBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
     $config = \Drupal::config("ms_custom.setting");
$lang_code = \Drupal::languageManager()->getCurrentLanguage()->getId();
   // print_r($nodes);exit;

    return array(
      '#theme' => 'theme_md_pub_hp',
      '#pub_link' => (object)array(
					  "pub_link" => $config->get('pub_link'),
                    ),
      '#cur_lang' => $lang_code,
	  '#cache' => [
          'max-age' => 0,
      ],
	  '#attached' => array(
                'library' => array(
                    'md_ms/md-pub-hp'
                )
            )
    );
  }

}
