<?php
/**
 * @file
 * Contains \Drupal\md_new_prestation\Controller\MainController.
 */

namespace Drupal\md_new_prestation\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Site\Settings;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\user\Entity\User;


class MainController extends ControllerBase
{


    /**
     * récupérer la liste des offres
     * @param $limit
     * @return \Drupal\Core\Entity\EntityInterface[]|static[]
     */
    public function getMailsByRole()
    {
        
$ids1 = \Drupal::entityQuery('user')
->condition('status', 1)
->execute();
$users = User::loadMultiple($ids1);

	return $users;
//kint($users->get('mail')->value);
}

    public function getMailsByRoletechnVerif() {
        
$query = \Drupal::entityQuery('user')
->condition('status', 1)
->condition('roles', 'technicien_e_prestation')
->execute();

$users = User::loadMultiple($query);

	return $users;
}
    public function getMailsByRoleComptable() {
        
$query = \Drupal::entityQuery('user')
->condition('status', 1)
->condition('roles', 'comptable')
->execute();

$users = User::loadMultiple($query);

	return $users;
}

    }

   