<?php

namespace Drupal\webform_mail_custom\Helper;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Mail\MailFormatHelper;
use Drupal\Core\Site\Settings;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\taxonomy\Entity\Term;
use Drupal\node\Entity\Node;

Class Helper{

  const SETTINGS = 'webform_mail.settings';
  
    /**
  * la liste des fonction event
  *
  */
  const TYPE_VID = "recrutement";
    public static function getTidByName($name, $vid) {
    $properties = [];
    if (!empty($name)) {
      $properties['name'] = $name;
    }
    if (!empty($vid)) {
      $properties['vid'] = $vid;
    }
    $terms = \Drupal::entityManager()->getStorage('taxonomy_term')->loadByProperties($properties);
    $term = reset($terms);

    return !empty($term) ? $term->id() : 0;
  }

  public static function addTerm($name, $vid){
     $term = Term::create([
        'vid' => $vid,
        'name' => $name,
    ]);
    $term->enforceIsNew();
    $term->save();
    return $term->id();
  }
 

}
