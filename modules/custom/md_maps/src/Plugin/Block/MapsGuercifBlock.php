<?php

namespace Drupal\md_maps\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a 'Maps Guercif Block' block.
 *
 * @Block(
 *  id = "md_maps_prov_guercif_block",
 *  admin_label = @Translation("maps province Guercif Block"),
 * )
 */
class MapsGuercifBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

 
$config = \Drupal::config("md_maps_prov_g.setting");
    //print_r($sliders);exit;
  
    return array(
      '#theme' => 'theme_md_maps_pro_guercif',
	   
	  '#md_maps_prov_g' => (object)array(
                      "title_1" => $config->get('title_1'),
					  "title_2" => $config->get('title_2'),
					  "title_3" => $config->get('title_3'),
					  "title_4" => $config->get('title_4'),
					  "title_5" => $config->get('title_5'),
					  "title_6" => $config->get('title_6'),
					  "title_7" => $config->get('title_7'),
					  "title_8" => $config->get('title_8'),
					  "title_9" => $config->get('title_9'),
					  "title_10" => $config->get('title_10'),
					  "title_11" => $config->get('title_11'),

					  "info_1" => $config->get('info_1'),
					  "info_2" => $config->get('info_2'),
					  "info_3" => $config->get('info_3'),
					  "info_4" => $config->get('info_4'),
					  "info_5" => $config->get('info_5'),
					  "info_6" => $config->get('info_6'),
					  "info_7" => $config->get('info_7'),
					  "info_8" => $config->get('info_8'),
					  "info_9" => $config->get('info_9'),
					  "info_10" => $config->get('info_10'),
					  "info_11" => $config->get('info_11'),
					),
		'#cache' => [
          'max-age' => 0,
      ],
	  '#attached' => array(
                'library' => array(
                    'md_maps/md-maps-err'
                )
            )
	);

   }
}
