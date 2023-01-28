<?php

namespace Drupal\tq_slider\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'SliderBlock' block.
 *
 * @Block(
 *  id = "tq_slider_block",
 *  admin_label = @Translation("Slider Block"),
 * )
 */
class SliderBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $query = \Drupal::entityQuery('node');
    $query->condition('type', 'slider');
    $query->condition('status', 1);
    $query->sort('created');
    $nids = $query->execute();
    $sliders = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);

    //print_r($sliders);exit;

    return array(
      '#theme' => 'theme_tq_slider',
      '#sliders' => $sliders,
	  '#cache' => [
          'max-age' => 0,
      ],
	  	  '#attached' => array(
                'library' => array(
                    'tq_slider/tq-slider-hp'
                )
            )
    );
  }

}
