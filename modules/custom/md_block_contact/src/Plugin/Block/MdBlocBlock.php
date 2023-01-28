<?php

namespace Drupal\md_block_contact\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a 'MdBlocBlock' block.
 *
 * @Block(
 *  id = "md_block_contact",
 *  admin_label = @Translation("md block contact Block"),
 * )
 */
class MdBlocBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {


$config = \Drupal::config("md_block_contact.setting");
    //print_r($sliders);exit;
    $site_config = \Drupal::config('system.site');
     $site_slogan_cnt = $site_config->get('slogan');

    return array(
      '#theme' => 'theme_md_block_contact',

	  '#md_block_contact' => (object)array(
	          "title_block_map" => $config->get('title_block_map'),
					  "info_block_map_1" => $config->get('info_block_map_1'),
					  "info_block_map_2" => $config->get('info_block_map_2'),
					  "info_block_map_3" => $config->get('info_block_map_3'),
					  "info_block_map_4" => $config->get('info_block_map_4'),
			   "cat_1_sub_menu1" => $config->get('cat_1_sub_menu1'),
			   "cat_1_sub_menu2" => $config->get('cat_1_sub_menu2'),
			   "cat_1_sub_menu3" => $config->get('cat_1_sub_menu3'),
			   "cat_1_sub_menu4" => $config->get('cat_1_sub_menu4'),
			   "cat_1_sub_menu5" => $config->get('cat_1_sub_menu5'),
			   "cat_1_sub_menu6" => $config->get('cat_1_sub_menu6'),
			   "cat_1_sub_menu7" => $config->get('cat_1_sub_menu7'),
			   "cat_1_sub_menu8" => $config->get('cat_1_sub_menu8'),
			   
			   			   "cat_2_link_1" => $config->get('cat_2_link_1'),
			   "cat_2_link_2" => $config->get('cat_2_link_2'),
			   "cat_2_link_3" => $config->get('cat_2_link_3'),
			   "cat_2_link_4" => $config->get('cat_2_link_4'),
			   "cat_2_link_5" => $config->get('cat_2_link_5'),
			   "cat_2_link_6" => $config->get('cat_2_link_6'),
			   "cat_2_link_7" => $config->get('cat_2_link_7'),
			   "cat_2_link_8" => $config->get('cat_2_link_8'),
			   "facebook" => $config->get('facebook'),
			   "twitter" => $config->get('twitter'),
			   "youtube" => $config->get('youtube'),
			   "insta" => $config->get('insta'),
			   "googleplus" => $config->get('googleplus'),
			   
                    ),
                    '#site_slogan_cnt' => $site_slogan_cnt,
	  '#cache' => [
          'max-age' => 0,
      ],
	  '#attached' => array(
                'library' => array(
                    'md_block_contact/md-block-contact-hp'
                )
            )
	);

   }
}
