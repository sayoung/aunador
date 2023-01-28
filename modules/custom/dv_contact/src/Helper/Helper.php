<?php
namespace Drupal\dv_contact\Helper;


require_once '/opt/drupal/vendor/autoload.php';;
use Twilio\Rest\Client;

use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Mail\MailFormatHelper;
use Drupal\Core\Site\Settings;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Mail\MailManagerInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\taxonomy\Entity\Term;
use Drupal\node\Entity\Node;
use Drupal\commerce_product\Entity\Product;
use Drupal\dv_contact\Controller\MainController;

Class Helper{

  const SETTINGS = 'Helper.settings';

 
  public static function sendSMS_confirmation($number){

    $config = \Drupal::config('Helper.settings');
$sid    = "AC647b35a24ac00392afa449eeb021f4d4";
$token  = "b2d2bdb88a70337ecc26f30c417c0118";
$twilio = new Client($sid, $token);
    $result =  $twilio->messages
                ->create($number,
				//array("from" => "+14158132792", "body" => "helllo ")
                  array("from" => "+14158132792", "body" => $config->get('sms_reception'))
                  );
                  return $result;
  }

  public static function sendSMS_Proposition_Rdv($number,$code){

    $config = \Drupal::config('Helper.settings');
$sid    = "AC647b35a24ac00392afa449eeb021f4d4";
$token  = "b2d2bdb88a70337ecc26f30c417c0118";
$twilio = new Client($sid, $token);
    $result =  $twilio->messages
                ->create($number,
				//array("from" => "+14158132792", "body" => "helllo ")
                  array("from" => "+14158132792", "body" => str_replace("[code]", $code, $config->get('sms_reply')))
                  );
                  return $result;
  }





public static function sendMail_Confirmation($to, $code, $title, $name){
	  $config = \Drupal::config('Helper.settings');






  $mailManager = \Drupal::service('plugin.manager.mail');
 // $module = 'module-name';
//  $key = 'node_insert'; // Replace with Your key
    $module = 'dv_contact';
  $key = 'contact_insrt';
  //$to = \Drupal::currentUser()->getEmail();
    $to = $to; 
  //$params['message'] = $message;
  $search  = array('[code]', '[name]');
  $replace = array($code,$name);
  $params['message'] = "<html lang='en'><head><title> Agence Urbaine de Nador-Driouch-Guercif </title></head><body><div>
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
                                                        <font size='3' face='Helvetica,sans-serif''>
                                                            <span style='font-size:12pt;'> " .  str_replace($search, $replace, $config->get('contact_reception')['value']) . " </span>
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
                                                                        <span style='font-size:8.5pt;'>".$config->get('contact_footer1')."</span>
                                                                    </font>
                                                                    <font size='2' color='#666666' face='Helvetica,sans-serif'>
                                                                        <span style='font-size:8.5pt;'>
                                                                            <br>".$config->get('contact_footer2')."
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
                                </div></body></html>";
  $params['title'] = "AUNADOR : Demande de rendez-vous";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;

  $result = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
  if ($result['result'] != true) {
    $message = t('There was a problem sending your email notification to @email.', array('@email' => $to));
    \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('mail-log')->error($message);
    return;
  }

  $message = t('An email notification has been sent to @email ', array('@email' => $to));
  \Drupal::messenger()->addMessage($message);
  \Drupal::logger('mail-log')->notice($message);


  }


public static function sendMail_Confirmation_cci($to, $code, $title,$name){
	  $config = \Drupal::config('Helper.settings');






  $mailManager = \Drupal::service('plugin.manager.mail');
 // $module = 'module-name';
//  $key = 'node_insert'; // Replace with Your key
    $module = 'dv_contact';
  $key = 'contact_insrt';
  //$to = \Drupal::currentUser()->getEmail();
    $to = $to; 
  //$params['message'] = $message;
  $search  = array('[code]', '[name]');
  $replace = array($code,$name);
  $params['message'] = "<html lang='en'><head><title> Agence Urbaine de Nador-Driouch-Guercif </title></head><body><div>
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
                                                        <font size='3' face='Helvetica,sans-serif''>
                                                            <span style='font-size:12pt;'> " .  str_replace($search, $replace, $config->get('contact_reception')['value']) . " </span>
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
                                                                        <span style='font-size:8.5pt;'>".$config->get('contact_footer1')."</span>
                                                                    </font>
                                                                    <font size='2' color='#666666' face='Helvetica,sans-serif'>
                                                                        <span style='font-size:8.5pt;'>
                                                                            <br>".$config->get('contact_footer2')."
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
                                </div></body></html>";
     $params['title'] = "AUNADOR : Demande de rendez-vous";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;
$controller = new MainController();
//$email = 'aundg2021web@gmail.com';	  
$too = array(); 
	  foreach($controller->getMailsByRoleContactcci() as $user){
	    $too[] = $user->get('mail')->value;
	}
	
	
		foreach($too as $email_c){
// $result = $mailManager->mail($module, $key, $too, $langcode, $params, NULL, $send);
 $result = $mailManager->mail($module, $key, $email_c, $langcode, $params, NULL, $send);
 if ($result['result'] != true) {
    $message = t('There was a problem sending your email notification to @email.', array('@email' => $email_c));
    \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('mail-log')->error($message);
    return;
  }

  $message = t('An email notification has been sent to @email ', array('@email' => $email_c));
  \Drupal::messenger()->addMessage($message);
  \Drupal::logger('mail-log')->notice($message);
	}


  }


public static function sendMailPropositionRdv($to, $code,$commnetaire ,$title, $date_rdv, $name){
	  $config = \Drupal::config('Helper.settings');
	  $mailManager = \Drupal::service('plugin.manager.mail');

  $module = 'dv_contact';
  $key = 'contact_insrt';
  $to = $to; 
  $search  = array('[code]', '[commenatire]', '[date_rdv]', '[name]');
  $replace = array($code, $commnetaire, $date_rdv,$name);
  $params['message'] = "<html lang='en'><head><title> Agence Urbaine de Nador-Driouch-Guercif </title></head><body><div>
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
                                                        <font size='3' face='Helvetica,sans-serif''>
                                                            <span style='font-size:12pt;'> " . str_replace($search, $replace, $config->get('contact_reply')['value']) . " </span>
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
                                                                        <span style='font-size:8.5pt;'>".$config->get('contact_footer1')."</span>
                                                                    </font>
                                                                    <font size='2' color='#666666' face='Helvetica,sans-serif'>
                                                                        <span style='font-size:8.5pt;'>
                                                                            <br>".$config->get('contact_footer2')."
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
                                </div></body></html>";

   $params['title'] = "AUNADOR : Demande de rendez-vous";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;

  $result = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
  if ($result['result'] != true) {
    $message = t('There was a problem sending your email notification to @email.', array('@email' => $to));
    \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('mail-log')->error($message);
    return;
  }

  $message = t('An email notification has been sent to @email ', array('@email' => $to));
  \Drupal::messenger()->addMessage($message);
  \Drupal::logger('mail-log')->notice($message);

  }

public static function sendMailPropositionRdv_cci($to, $code,$commnetaire ,$title, $date_rdv,$name){
	  $config = \Drupal::config('Helper.settings');
	  $mailManager = \Drupal::service('plugin.manager.mail');

  $module = 'dv_contact';
  $key = 'contact_insrt';
  $to = $to; 
  $search  = array('[code]', '[commenatire]', '[date_rdv]', '[name]');
  $replace = array($code, $commnetaire, $date_rdv,$name);
  $params['message'] = "<html lang='en'><head><title> Agence Urbaine de Nador-Driouch-Guercif </title></head><body><div>
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
                                                        <font size='3' face='Helvetica,sans-serif''>
                                                            <span style='font-size:12pt;'> " . str_replace($search, $replace, $config->get('contact_reply')['value']) . " </span>
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
                                                                        <span style='font-size:8.5pt;'>".$config->get('contact_footer1')."</span>
                                                                    </font>
                                                                    <font size='2' color='#666666' face='Helvetica,sans-serif'>
                                                                        <span style='font-size:8.5pt;'>
                                                                            <br>".$config->get('contact_footer2')."
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
                                </div></body></html>";

   $params['title'] = "AUNADOR : Demande de rendez-vous";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;
$controller = new MainController();
//$email = 'aundg2021web@gmail.com';	  
$too = array(); 
	  foreach($controller->getMailsByRoleContactcci() as $user){
	    $too[] = $user->get('mail')->value;
	}
	
	
		foreach($too as $email_c){
// $result = $mailManager->mail($module, $key, $too, $langcode, $params, NULL, $send);
 $result = $mailManager->mail($module, $key, $email_c, $langcode, $params, NULL, $send);
 if ($result['result'] != true) {
    $message = t('There was a problem sending your email notification to @email.', array('@email' => $email_c));
    \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('mail-log')->error($message);
    return;
  }

  $message = t('An email notification has been sent to @email ', array('@email' => $email_c));
  \Drupal::messenger()->addMessage($message);
  \Drupal::logger('mail-log')->notice($message);
	}


  }


    
    
    
}
