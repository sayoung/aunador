<?php
namespace Drupal\commerce_cmi\Helper;


//require_once '/home/adminaust/public_html/aust/vendor/autoload.php';
use Drupal\notemail\Helper\Helper;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\commerce_order\Entity\Order;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\user\Entity\User;
use Drupal\webform\Entity;
use Drupal\webform\Entity\WebformSubmission;
use Drupal\webform_product\Plugin\WebformHandler;
use Drupal\webform\Entity\Webform;
use Drupal\webform\WebformSubmissionForm;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\Core\Messenger\MessengerTrait;
use Drupal\webform\WebformInterface;
use Drupal\webform\WebformSubmissionInterface;
use Drupal\webform_product\Plugin\WebformHandler\WebformProductWebformHandler;
use Drupal\node\Entity\Node;
use Drupal\file\Entity\File;
use Drupal\Core\Datetime;
use Drupal\commerce_product\Entity\Product;
use Drupal\commerce_product\Entity\ProductVariation;

use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Mail\MailFormatHelper;
use Drupal\Core\Site\Settings;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\Entity\EntityInterface;
 
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Serialization\Yaml;

use Drupal\webform\Plugin\WebformHandlerBase;

use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\taxonomy\Entity\Term;
use Drupal\Component\Serialization\Json;

use Drupal\Core\Form\FormBase;

use Drupal\webform\Element\WebformHtmlEditor;
use Drupal\webform\WebformSubmissionConditionsValidatorInterface;
use Drupal\webform\WebformTokenManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Drupal\Core\File\FileSystemInterface;

use Drupal\Component\Utility\Xss;

use Drupal\Core\Render\Markup;

class Aunote{
const SETTINGS = 'notemail.settings';
    
            /**  ---------------------------------------------------------------------------------------------- */
  public static function createnote($webform_submission_id,$order_id){
	  /** /-------------------------------------------------------------------------- */

$webform_id = 'e_note';

// Check webform is open.
$webform = Webform::load($webform_id);
$is_open = WebformSubmissionForm::isOpen($webform);

if ($is_open === TRUE) {
  // Load submission
  $node_details = WebformSubmission::load($webform_submission_id);

  // Modify submission values
    
    $wf_changed = $node_details->getChangedTime();
    $submission_array = $node_details->getOriginalData();
   
  
  $items = \Drupal::entityTypeManager() 
      ->getStorage('node') 
     ->loadByProperties(['field_webform_' => $webform_submission_id]); // load all nodes with the type post

$node_note = Node::load(reset($items)->id());
//set value for field
$node_note->field_n_command = $order_id ;
$node_note->field_cheking = 1;
	$node_note->save();
	
	
 
    }
    
 

}

/** /-------------------------------------------------------------------------- */ 
public static function dossierpaye($prestation_id){
//	$aassz =  \Drupal::request()->request->get('itemnumberN');
				
			//$ProductV->set('field_is_payed' , 1);
			//$product->save();
		
			//$id2 = $ProductV->getProductId();
			//$id2 = 49540;
			//kint($id2);die;
			$product = Product::load($prestation_id);
			$product->set('field_is_payed' , 1);
			$product->save();
			
}
/** -----------------------------------------------------------------------------*/ 
public static function  ventedocum($vnomcomplet,$vmail,$vtel){
    
$config = \Drupal::config('notemail.settings');
	  $mailManager = \Drupal::service('plugin.manager.mail');

  $module = 'commerce_cmi';
  $key = 'node_insert';
  $email = $vmail; 
  $params['message'] = "<html lang='fr'><head><title> Agence Urbaine de Meknes </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='http://aunador.ma/themes/au/images/logo.png' >
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                             <tr style='height:3.75pt;' height='6'>
                                                <td colspan='3' style='height:3.75pt;background-color:#D8512D;padding:0;'>
                                                    <span style='background-color:#D8512D;'></span>
                                                </td>
                                            </tr>
                                            <tr style='height:275.25pt;' height='458'>
                                                <td colspan='3' style='width:459.55pt;height:275.25pt;padding:0 3.5pt;' width='765' valign='top'>
                                                    <div style='margin:0;'>
                                                        <font size='3' face='Helvetica,sans-serif'>
                                                            <span style='font-size:12pt;'> " . str_replace("[client]", $vnomcomplet, $config->get('document_mail')['value']) . " </span>
                                                        </font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style='height:32.8pt;' height='54'>
                                                <td colspan='3' style='width:459.55pt;height:32.8pt;background-color:#F3F3F3;padding:0 3.5pt;' width='765' valign='top'>
                                                    <span style='background-color:#F3F3F3;'>
                                                        <div style='text-align:center;margin-right:0;margin-left:0;' align='center'>
                                                            <font size='3' face='Times New Roman,serif'>
                                                                <span style='font-size:12pt;'>
                                                                    <font size='2' color='#666666' face='Helvetica,sans-serif'>
                                                                        <span style='font-size:8.5pt;'>".$config->get('footer1')."</span>
                                                                    </font>
                                                                    <font size='2' color='#666666' face='Helvetica,sans-serif'>
                                                                        <span style='font-size:8.5pt;'>
                                                                            <br>".$config->get('footer2')."
                                                                        </span>
                                                                    </font>
                                                                </span>
                                                            </font>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div></body></html>";;
  $params['node_title'] = "Votre demande d’achat de  vente de documents en ligne.";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;

  //$result = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
                 $ccmail_m = "mourad.dardari@gmail.com";
                $reply = NULL;
                $from_send = 'e_services@aunador.ma';
                $message['headers']['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                $headers = "From: ". $from_send . "\r\n" .
                            "MIME-Version: 1.0" . "\r\n" .
                            "Cc: " . $ccmail_m . "\r\n" .
                            "Content-type: text/html; charset=UTF-8" . "\r\n";
                    $subject_info = "Votre demande d’achat de  vente de documents en ligne";
                    $subject = "=?UTF-8?B?" . base64_encode($subject_info) . "?=";
  
  

                $result =  mail($email, $subject, $params['message'], $headers);
                //	echo "ok";
                if ($result !== true) {
                    $message = t('There was a problem sending your email notification to @email.', array('@email' => $email));
                    \Drupal::messenger()->addMessage($message, 'error');
                    \Drupal::logger('Workflowmail')->error($message);
                  }
                  else {
                    \Drupal::messenger()->addMessage(t('Your message has been sent to  @email.', array('@email' => $email)));
                  }

			
}
public static function  ventedocumbo($vnomcomplet,$vmail,$vtel,$pridcut_title,$remarque){
    
$config = \Drupal::config('notemail.settings');
	  $mailManager = \Drupal::service('plugin.manager.mail');
$bo_mail = $config->get('documentcci'); 
  $module = 'commerce_cmi';
  $key = 'node_insert';
  $email = $bo_mail; 
$search  = array('[client]', '[tel]', '[mail]', '[product_title]','[remarque]');
$replace = array($vnomcomplet, $vtel, $vmail, $pridcut_title,$remarque);
  $params['message'] = "<html lang='fr'><head><title> Agence Urbaine de Meknes </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='http://aunador.tequality.ma/themes/au/images/logo.png' >
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr style='height:3.75pt;' height='6'>
                                                <td colspan='3' style='height:3.75pt;background-color:#D8512D;padding:0;'>
                                                    <span style='background-color:#D8512D;'></span>
                                                </td>
                                            </tr>

                                            <tr style='height:275.25pt;' height='458'>
                                                <td colspan='3' style='width:459.55pt;height:275.25pt;padding:0 3.5pt;' width='765' valign='top'>
                                                    <div style='margin:0;'>
                                                    <font size='3' face='Helvetica,sans-serif'>
                                                            <span style='font-size:12pt;'> " . str_replace($search, $replace, $config->get('document_mail_bo')['value']) . "</span>
                                                        </font>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style='height:32.8pt;' height='54'>
                                                <td colspan='3' style='width:459.55pt;height:32.8pt;background-color:#F3F3F3;padding:0 3.5pt;' width='765' valign='top'>
                                                    <span style='background-color:#F3F3F3;'>
                                                        <div style='text-align:center;margin-right:0;margin-left:0;' align='center'>
                                                            <font size='3' face='Times New Roman,serif'>
                                                                <span style='font-size:12pt;'>
                                                                    <font size='2' color='#666666' face='Helvetica,sans-serif'>
                                                                        <span style='font-size:8.5pt;'>".$config->get('footer1')."</span>
                                                                    </font>
                                                                    <font size='2' color='#666666' face='Helvetica,sans-serif'>
                                                                        <span style='font-size:8.5pt;'>
                                                                            <br>".$config->get('footer2')."
                                                                        </span>
                                                                    </font>
                                                                </span>
                                                            </font>
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div></body></html>";;
  $params['node_title'] = "Achat de documents en ligne.";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;
 $ccmail_m = "mourad.dardari@gmail.com";
                $reply = NULL;
                $from_send = 'e_services@aunador.ma';
                $message['headers']['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
                $headers = "From: ". $from_send . "\r\n" .
                            "MIME-Version: 1.0" . "\r\n" .
                            "Cc: " . $ccmail_m . "\r\n" .
                            "Content-type: text/html; charset=UTF-8" . "\r\n";
                    $subject_info = "Achat de documents en ligne";
                    $subject = "=?UTF-8?B?" . base64_encode($subject_info) . "?=";
  
  

                $result =  mail($email, $subject, $params['message'], $headers);
                //	echo "ok";
                if ($result !== true) {
                    $message = t('There was a problem sending your email notification to @email.', array('@email' => $email));
                    \Drupal::messenger()->addMessage($message, 'error');
                    \Drupal::logger('Workflowmail')->error($message);
                  }
                  else {
                    \Drupal::messenger()->addMessage(t('Your message has been sent to  @email.', array('@email' => $email)));
                  }

			
}

public static function  ventedocum_create_historique($vnomcomplet,$vmail,$vtel,$pridcut_title,$remarque,$adress_user,$support,$echelle,$unite,$price,$dimension,$cin_fid,$product_id, $order_id){
    
      if (!empty($cin_fid)) {
      $file = \Drupal\file\Entity\File::load($cin_fid);
      $path = $file->getFileUri();
      $data = file_get_contents($path);
      $cin_fid_file = file_save_data($data, 'public://' . $file->getFilename(), FileSystemInterface::EXISTS_REPLACE);
    }
    $price = str_replace(" MAD","",$price);
    //$file = file_save_data($data, 'public://druplicon.png', FILE_EXISTS_REPLACE);
    $pridcut_title1 = mb_convert_encoding($pridcut_title, "UTF-8");
    $uuid_note =  time();
    $node = Node::create([
 	  'type' =>  'documents_urbanisme',
	  'uid' => 1,
	  'title' =>  $vnomcomplet . ' ' .  $pridcut_title ,
	  'field_comune_' => $product_id,
      'field_n_command' => $order_id,
	  'field_document_name' =>  $pridcut_title1 ,
	  'field_echelle' => $echelle,
	  'field_email' => $vmail,
	  'field_emplacement_x_y' => $remarque,
	  'field_nom' => $vnomcomplet,
      'field_prix' => $price,
	  'field_quantite' => $dimension,
	  'field_dimension' => $dimension,
	  'field_support' => $support,
	  'field_telephone_' => $vtel,
	  'field_unite' => $unite,
      'field_adresse' => $adress_user,
      'field_uuid' => $uuid_note,
	  'field_carte_d_identite_nationale' => [
        'target_id' => (!empty($cin_fid_file) ? $cin_fid_file->id() : NULL),
        'alt' => 'Carte d identité nationale scannée (PDF)(*)',
        'title' => 'Carte d identité nationale scannée'
      ],
	  'field_cheking' => 1,
	  //'field_uuid' => $uuid_note,
	  // 'field_webform_' => $webform_submission->id(),
                		]);
					  $node->save();
				   
  
}


}