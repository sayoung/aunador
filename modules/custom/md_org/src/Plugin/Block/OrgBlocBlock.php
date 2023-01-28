<?php

namespace Drupal\md_org\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a 'OrgBlocBlock' block.
 *
 * @Block(
 *  id = "md_org",
 *  admin_label = @Translation("md org Block"),
 * )
 */
class OrgBlocBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {


$config = \Drupal::config("md_org.setting");
    //print_r($sliders);exit;

    return array(
      '#theme' => 'theme_md_orgs_page',

	  '#md_org' => (object)array(
	                "dir_nom_au" => $config->get('dir_nom_au'),
					"dir_title_au" => $config->get('dir_title_au'),
					"dir_desc_au" => $config->get('dir_desc_au'),
					"ch_mis_nom_au" => $config->get('ch_mis_nom_au'),
					"ch_mis_title_au"=> $config->get('ch_mis_title_au'),
					"ch_mis_desc_au"=> $config->get('ch_mis_desc_au'),
					"dep_et_tp_nom_au"=> $config->get('dep_et_tp_nom_au'),
					"dep_et_tp_title_au"=> $config->get('dep_et_tp_title_au'),
					"dep_et_tp_desc_au"=> $config->get('dep_et_tp_desc_au'),
					"div_aaf_nom_au"=> $config->get('div_aaf_nom_au'),
					"div_aaf_title_au"=> $config->get('div_aaf_title_au'),
					"div_aaf_desc_au"=> $config->get('div_aaf_desc_au'),
					"cdgur_nom_au"=> $config->get('cdgur_nom_au'),
					"cdgur_title_au"=> $config->get('cdgur_title_au'),
					"cdgur_desc_au"=> $config->get('cdgur_desc_au'),
					"csi_nom_au"=> $config->get('csi_nom_au'),
					"csi_title_au"=> $config->get('csi_title_au'),
					"csi_desc_au"=> $config->get('csi_desc_au'),
                    ),
	  '#cache' => [
          'max-age' => 0,
      ],
	   '#attached' => array(
           'library' => array(
            'md_org/md-org'
                )
            )
	);

   }
}
