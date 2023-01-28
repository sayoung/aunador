<?php
/**
 * @file
 * Contains \Drupal\notemail\Controller\MainControllerWorflow.
 */

namespace Drupal\notemail\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Site\Settings;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\user\Entity\User;


class MainControllerWorflow extends ControllerBase
{
    /**
     * récupérer la liste des offres
     * @param $limit
     * @return \Drupal\Core\Entity\EntityInterface[]|static[]
     */
   
    


public function getMailsByRoleTech($note_province,$note_etape)
{

if ($note_province == "Nador") {
    $note_province = 1;
} elseif ($note_province == "Driouch") {
    $note_province = 2;
} elseif ($note_province == "Guercif") {
    $note_province = 3;
}

if ($note_etape == "checking") {
    $roles_by_etap = "technicien";
} elseif ($note_etape == "comptabilite") {
    $roles_by_etap = "comptable";
} elseif ($note_etape == "traitement") {
    $roles_by_etap = "technicien_traitement";
}elseif ($note_etape == "validation") {
    $roles_by_etap = "validateur";
}elseif ($note_etape == "dispatcheur") {
    $roles_by_etap = "dg";
}elseif ($note_etape == "annulation") {
    $roles_by_etap = "comptable";
}elseif ($note_etape == "article_4") {
    $roles_by_etap = "comptable";
}elseif ($note_etape == "verification_par_cs_") {
    $roles_by_etap = "verification_par_cs";
}elseif ($note_etape == "enregistrement_bo") {
    $roles_by_etap = "enregistrement_bo";
}






$query = \Drupal::entityQuery('user');
$condition_or = $query->orConditionGroup()
->condition('field_province.0.value', $note_province)
->condition('field_province.1.value', $note_province)
->condition('field_province.2.value', $note_province);

$condition_and = $query->andConditionGroup()
->condition('status', 1)
->condition('roles', $roles_by_etap);
$query = $query->condition($condition_or)
->condition($condition_and)
->execute();

//$group = $query->orConditionGroup()
//  ->condition('roles', 'administrator')
// ->condition('roles', 'technicien');
//$tids = $query->condition($group)->execute();
$users = User::loadMultiple($query);
return $users;

//kint();
}



    }

   