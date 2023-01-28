<?php
/**
 * @file
 * Contains \Drupal\md_videotheque\Controller\VideoController.
 */

namespace Drupal\md_videotheque\Controller;

use Drupal\Core\Controller\ControllerBase;

class VideoController extends ControllerBase
{
    public function getVideos()
    {
		$lang_code = \Drupal::languageManager()->getCurrentLanguage()->getId();
        $query = \Drupal::entityQuery('node');
        $query->condition('type', 'video');
        $query->condition('status', 1);
        $query->sort('created', 'desc');
		$query->condition('langcode', $lang_code);
        $nids = $query->execute();
        $nodes = \Drupal::entityTypeManager()->getStorage('node')->loadMultiple($nids);
    
        return array(
          '#theme' => 'theme_md_video_page',
		  '#cur_lang' => $lang_code,
          '#nodes' => $nodes
        );
    }
}