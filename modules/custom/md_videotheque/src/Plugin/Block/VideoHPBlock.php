<?php

namespace Drupal\md_videotheque\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'VideoHPBlock' block.
 *
 * @Block(
 *  id = "md_videotheque_hp_block",
 *  admin_label = @Translation("Video HP Block"),
 * )
 */
class VideoHPBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
//$lang_code = \Drupal::languageManager()->getCurrentLanguage()->getId();
    $query = \Drupal::entityQuery('node');
    $query->condition('type', 'video');
    $query->condition('status', 1);
   // $query->condition('langcode', $lang_code);
    $query->condition('field_homepage.value', 1);
    $query->sort('created', 'desc');
    $query->range(0, 1);
    $nids = $query->execute();
    $node = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

    //print_r($node);exit;

    return array(
      '#theme' => 'theme_md_videotheque_hp',
      '#video_hp' => $node,
    //  '#cur_lang' => $lang_code,
	  '#cache' => [
          'max-age' => 0,
      ],
	  '#attached' => array(
                'library' => array(
                    'md_videotheque/md-video-hp'
                )
            )
    );
  }

}
