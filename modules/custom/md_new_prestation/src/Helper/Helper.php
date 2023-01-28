<?php
namespace Drupal\md_new_prestation\Helper;


require_once '/opt/drupal/vendor/autoload.php';
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
use Drupal\md_new_prestation\Controller\MainController;

Class Helper{

  const SETTINGS = 'Helper.settings';

 
  public static function sendSMSlV($number){

    $config = \Drupal::config('Helper.settings');
$sid    = "AC647b35a24ac00392afa449eeb021f4d4";
$token  = "b2d2bdb88a70337ecc26f30c417c0118";
$twilio = new Client($sid, $token);
    $result =  $twilio->messages
                ->create($number,
				//array("from" => "+14158132792", "body" => "helllo ")
                  array("from" => "+14158132792", "body" => $config->get('isms_phone_ver'))
                  );
                  return $result;
  }

  public static function sendSMdS($number,$code){

    $config = \Drupal::config('Helper.settings');
$sid    = "AC647b35a24ac00392afa449eeb021f4d4";
$token  = "b2d2bdb88a70337ecc26f30c417c0118";
$twilio = new Client($sid, $token);
    $result =  $twilio->messages
                ->create($number,
				//array("from" => "+14158132792", "body" => "helllo ")
                  array("from" => "+14158132792", "body" => str_replace("[code]", $code, $config->get('isms_phone')))
                  );
                  return $result;
  }

  public static function sendSMSFd($number,$code){

    $config = \Drupal::config('Helper.settings');
$sid    = "AC647b35a24ac00392afa449eeb021f4d4";
$token  = "b2d2bdb88a70337ecc26f30c417c0118";
$twilio = new Client($sid, $token);
    $result =  $twilio->messages
                ->create($number,
				//array("from" => "+14158132792", "body" => "helllo ")
                  array("from" => "+14158132792", "body" => str_replace("[code]", $code, $config->get('isms_phone_final')))
                  );
                  return $result;
  }
public static function sendMailVerification($to, $title){
	  $config = \Drupal::config('Helper.settings');
	  $mailManager = \Drupal::service('plugin.manager.mail');

  $module = 'md_new_prestation';
  $key = 'node_insert';
  $to = $to; 
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
                                              <span style='font-size:12pt;'> " . $config->get('imessage_mail_veri')['value'] . " </span>
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
                                </div></body></html>";
  $params['node_title'] = "instruction";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  
  $send = true;
            $reply = NULL;
 $controller = new MainController();
//$email = 'aundg2021web@gmail.com';	  
$too = array(); 
	  foreach($controller->getMailsByRoletechnVerif() as $user){
	    $too[] = $user->get('mail')->value;
	//	print_r($emails); echo "</br>";
		
		
      
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


public static function sendMailValidation($to, $code, $title){
	  $config = \Drupal::config('Helper.settings');
	  $mailManager = \Drupal::service('plugin.manager.mail');

  $module = 'md_new_prestation';
  $key = 'node_insert';
  $to = $to; 
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
                                                            <span style='font-size:12pt;'> " . str_replace("[code]", $code, $config->get('imessage_mail_first')['value']) . " </span>
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
                                </div></body></html>";
  $params['node_title'] = "instruction";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;
           
            $reply = NULL;
    $tt = "e_services@auttt.ma";
      $headers = "From: ". $tt . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";

  //  = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send,$headers);
  $result = $mailManager->mail($module, $key, $to, $langcode, $params , $reply, $send);
  if ( ! $result['result']) {
    $message = t('There was a problem sending your email notification to @email for creating node @id.');
    \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('notemail')->error($message);
    return;
  }
}

public static function sendMailComptable($to, $code, $title){
	  $config = \Drupal::config('Helper.settings');
	  $mailManager = \Drupal::service('plugin.manager.mail');

  $module = 'md_new_prestation';
  $key = 'node_insert';
   $email = 'aundg2021web@gmail.com'; 
  $to = $to; 
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
                                                            <span style='font-size:12pt;'> " . str_replace("[code]", $code, $config->get('imessage_mail')['value']) . " </span>
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
                                </div></body></html>";
  $params['title'] = "instruction";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;
   $controller = new MainController();
//$email = 'aundg2021web@gmail.com';	  
$too = array(); 
	  foreach($controller->getMailsByRoleComptable() as $user){
	    $too[] = $user->get('mail')->value;
	//	print_r($emails); echo "</br>";
		
		
      
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



public static function sendMailFacture($to, $code, $title){
	  $config = \Drupal::config('Helper.settings');






  $mailManager = \Drupal::service('plugin.manager.mail');
 // $module = 'module-name';
//  $key = 'node_insert'; // Replace with Your key
    $module = 'md_new_prestation';
  $key = 'node_insert';
  //$to = \Drupal::currentUser()->getEmail();
    $to = $to; 
  //$params['message'] = $message;
  
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
                                                            <span style='font-size:12pt;'> " . str_replace("[code]", $code, $config->get('imessage_mail')['value']) . " </span>
                                                        </font>
                                                        
                                                    </div>
                                                    <div style='margin:0;'>
                                                       
                                                        <font size='3' face='Helvetica,sans-serif''>
                                                            <span style='font-size:12pt;'><a href='www.aundaor.ma'>www.aundaor.ma</a></span>
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
                                </div></body></html>";
  $params['title'] = "instruction";
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


public static function sendMailAnnulation($to, $code,$commnetaire ,$title){
	  $config = \Drupal::config('Helper.settings');
	  $mailManager = \Drupal::service('plugin.manager.mail');

  $module = 'md_new_prestation';
  $key = 'node_insert';
  $to = $to; 
  $search  = array('[code]', '[commenatire]');
  $replace = array($code, $commnetaire);
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
                                                            <span style='font-size:12pt;'> " . str_replace($search, $replace, $config->get('imessage_mail_annulation')['value']) . " </span>
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
                                </div></body></html>";
  $params['node_title'] = "instruction";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;
            $reply = NULL;
     $tt = "e_services@aunador.ma";
      $headers = "From: ". $tt . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";

 $result  = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send,$headers);
   $mailManager->mail($module, $key, $to, $langcode, $params , $reply, $send);
 // $result = $mailManager->mail($module, $key, $to, $langcode, $params , $reply, $send);
  if ( ! $result['result']) {
    $message = t('There was a problem sending your email notification to @email for creating node @id.');
  //  \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('md_new_prestation')->error($message);
    return;
  }
   $message = t('An email notification has been sent to @email for creating node @id.');
 // \Drupal::messenger()->addMessage($message);
  \Drupal::logger('md_new_prestation')->notice($message);

  }

}
