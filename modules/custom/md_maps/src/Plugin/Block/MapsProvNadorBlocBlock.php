<?php

namespace Drupal\md_maps\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;
/**
 * Provides a 'MapsProvNadortBlock' block.
 *
 * @Block(
 *  id = "md_maps_prov_nador_block",
 *  admin_label = @Translation("maps province Nador Block"),
 * )
 */
class MapsProvNadorBlocBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

 
$config = \Drupal::config("md_maps_prov_m.setting");
    //print_r($sliders);exit;
  
    return array(
      '#theme' => 'theme_md_maps_pro_nador',
	   
	  '#md_maps_prov_m' => (object)array(
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
					  "title_12" => $config->get('title_12'),
					  "title_13" => $config->get('title_13'),
					  "title_14" => $config->get('title_14'),
					  "title_15" => $config->get('title_15'),
					  "title_16" => $config->get('title_16'),
					  "title_17" => $config->get('title_17'),
					  "title_18" => $config->get('title_18'),
					  "title_19" => $config->get('title_19'),
					  "title_20" => $config->get('title_20'),
					  "title_21" => $config->get('title_21'),
					  "title_22" => $config->get('title_22'),
					  "title_23" => $config->get('title_23'),
					  "title_24" => $config->get('title_24'),
					  "title_25" => $config->get('title_25'),
					  "title_26" => $config->get('title_26'),
					  "title_27" => $config->get('title_27'),
					  "title_28" => $config->get('title_28'),
					  "title_29" => $config->get('title_29'),
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
					  "info_12" => $config->get('info_12'),
					  "info_13" => $config->get('info_13'),
					  "info_14" => $config->get('info_14'),
					  "info_15" => $config->get('info_15'),
					  "info_16" => $config->get('info_16'),
					  "info_17" => $config->get('info_17'),
					  "info_18" => $config->get('info_18'),
					  "info_19" => $config->get('info_19'),
					  "info_20" => $config->get('info_20'),
					  "info_21" => $config->get('info_21'),
					  "info_22" => $config->get('info_22'),
					  "info_23" => $config->get('info_23'),
					  "info_24" => $config->get('info_24'),
					  "info_25" => $config->get('info_25'),
					  "info_26" => $config->get('info_26'),
					  "info_27" => $config->get('info_27'),
					  "info_28" => $config->get('info_28'),
					  "info_29" => $config->get('info_29'),
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
   public function getCacheTags() {
    //With this when your node change your block will rebuild
    if ($node = \Drupal::routeMatch()->getParameter('node')) {
      //if there is node add its cachetag
      return Cache::mergeTags(parent::getCacheTags(), array('node:' . $node->id()));
    } else {
      //Return default tags instead.
      return parent::getCacheTags();
    }
  }
   public function getCacheContexts() {
    //if you depends on \Drupal::routeMatch()
    //you must set context of this block with 'route' context tag.
    //Every new route this block will rebuild
    return Cache::mergeContexts(parent::getCacheContexts(), array('route'));
  }
}
