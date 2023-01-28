<?php

namespace Drupal\webform_mail_custom\Plugin\WebformHandler;

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Serialization\Yaml;
use Drupal\Core\Form\FormStateInterface;

use Drupal\node\Entity\Node;

use Drupal\webform\WebformInterface;
use Drupal\webform\Plugin\WebformHandlerBase;
use Drupal\webform\webformSubmissionInterface;
use Drupal\webform\Entity\WebformSubmission;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Drupal\Core\Routing\CurrentRouteMatch;


use Drupal\taxonomy\Entity\Term;
use Drupal\webform_mail_custom\Helper\Helper;


/**
 * Creates a new node from Webform recrutement Submissions.
 *
 * @WebformHandler(
 *   id = "Create a node recrutement",
 *   label = @Translation("Create a node from recrutement"),
 *   category = @Translation("Entity Creation"),
 *   description = @Translation("Creates a new node from Webform recrutement Submissions."),
 *   cardinality = \Drupal\webform\Plugin\WebformHandlerInterface::CARDINALITY_UNLIMITED,
 *   results = \Drupal\webform\Plugin\WebformHandlerInterface::RESULTS_PROCESSED,
 *   submission = \Drupal\webform\Plugin\WebformHandlerInterface::SUBMISSION_REQUIRED,
 * )
 */

class MyCandiWebformHandler extends WebformHandlerBase {
  
  /**
   * {@inheritdoc}
   */
   
  // Create node object from webform-submission.
  
  // Function to be fired while submitting the Webform.
  public function submitForm(array &$form, FormStateInterface $form_state, WebformSubmissionInterface $webform_submission) {
    // Get an array of the values from the submission.
	 $language = \Drupal::languageManager()->getCurrentLanguage()->getId();
        $values = $webform_submission->getData();
 
    // Before you actually save the node, make sure you get what you
    // want. So at first comment the line further down with 
    // $node->save(), run the debug code, check the output and then
    // uncomment the $node->save() and delete the debug foreach loop.
    // You can use whatever debug method you prefer, this is just a
    // simple one-time example.
   //  $values = $webform_submission->getData();

//	$recurtement = \Drupal::routeMatch()->getRawParameter('node');
		$recurtement = \Drupal::routeMatch()->getParameter('node');

$term_name = $recurtement->title->value;
        if($term_name){
                  $commission_id = Helper::getTidByName($term_name, Helper::TYPE_VID);
                  if(!$commission_id){
                      $commission_id = Helper::addTerm($term_name, Helper::TYPE_VID);
                  }
              }
			// demande_maniscrite 
	    $dossier_de_candidature_fid = $values['dossier'];
		
    if (!empty($dossier_de_candidature_fid)) {
      $file = \Drupal\file\Entity\File::load($dossier_de_candidature_fid);
      $path = $file->getFileUri();
      $data = file_get_contents($path);
      $node_dossier_de_candidature = file_save_data($data, 'public://' . $file->getFilename(), FILE_EXISTS_REPLACE);
    }

    // This is the node creating/saving part.
      $node = Node::create([
	// Use this format: 'node_machine_name_field' => $values('webform_machine_name_field') for below fields.
 	  'type' =>  'recrutement',
	  'uid' => 1,
	  'title' => 'Candidature de la part : '.  $values['nom_'] . ' '. $values['prenom_'] ,
	  'field_nom_' =>  $values['nom_'],
	  'field_prenom_' =>  $values['prenom_'],
	  'field_cnie' =>  $values['cnie_'],
	  'field_telephone_' =>  $values['telephone_']['phone'],
	  'field_email_' =>  $values['email_'],
	  'field_date_de_naissance_' =>  $values['date_de_naissance_'],
      'field_niveau' =>  $values['votre_niveau_d_etudes'],
      'field_date_d_obtention_du_diplom' =>  $values['date_d_obtention_du_diplome_'],
	  
	  'field_intitule_du_diplome_obtenu' =>  $values['intitule_du_diplome_obtenu_'],
	  'field__nom_de_l_etablissement' =>  $values['nom_de_l_etablissement'],
	  'field_autres_diplomes' =>  $values['autres_diplomes'],
	  'field__experience_1' =>  $values['_experience_1'],
	  
	  
	  
	  'field_offre_emploi' => ['target_id' => intval($commission_id)],
	 
	 
	 // Les Documents 
	  // demande_manuscrite 
      'field_dossier_de_candidature' => [
        'target_id' => (!empty($node_dossier_de_candidature) ? $node_dossier_de_candidature->id() : NULL),
        'alt' => 'dossier de candidature',
        'title' => 'dossier de candidature'
      ],
    // etc... 
     ]);

    $node->save();
	
  }
	
  }