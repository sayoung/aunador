<?php

namespace Drupal\notemail\Helper;
require_once '/opt/drupal/vendor/autoload.php';
//require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Mail\MailFormatHelper;
use Drupal\Core\Site\Settings;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\notemail\Controller\MainController;
use Drupal\node\Entity\Node;
use Drupal\Core\Mail\MailManagerInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Render\Markup;


Class Helper{
	  const SETTINGS = 'notemail.settings';
	  

	 // const $aa    = "AC6b26dc985a5921ba938a9ebced1c5536";
 // const $aaa  = "7d90cf0da5c42a69ce7e8d673848a665";
  public static function sendSMS($number, $code){
$config = \Drupal::config('notemail.settings');
$sid    = "AC6b26dc985a5921ba938a9ebced1c5536";
$token  = "7d90cf0da5c42a69ce7e8d673848a665";
$twilio = new Client($sid, $token);
 //   $twilio = new Client(self::SID, self::TOKEN);
     try { 
    $twilio->messages
                ->create($number,
                           array("from" => "aunador", "body" =>str_replace("[code]", $code, $config->get('message_phone')))
                  );
  }
   catch (\Twilio\Exceptions\RestException $e) {
            $message = t('There was a problem sending your sms notification.');
   // \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('notemail')->error($message);
    return;
     }
  }
  public static function sendMail($to, $code, $title){
	  $config = \Drupal::config('notemail.settings');
      $mailManager = \Drupal::service('plugin.manager.mail');
      $module = 'notemail';
      $key = 'create_article';
      $to = $to;
      $logo = 'https://aunador.ma/themes/au/images/logo.png';
      $params['message'] = Markup::create("<html lang='en'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'> <title> ZZ </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='https://aunador.ma/themes/au/images/logo.png' >
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
                                                            <span style='font-size:12pt;'> " . str_replace("[code]", $code, $config->get('message_mail')['value']) . " </span>
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
                                </div></body></html>");
                                
                               $params['node_title'] = "AUNADOR - E-note";
      $langcode = \Drupal::currentUser()->getPreferredLangcode();
      $send = true;
	  $ccmail = $config->get('emailcci');
	  $from_send = 'e_services@aunador.ma';
	    $headers = "From: ". $from_send . "\r\n" .
            "Bcc: " . $ccmail . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8; format=flowed" . "\r\n";
	  $subject = "=?UTF-8?B?" . base64_encode($config->get('subject')) . "?=";
      return mail($to, $subject, $params['message'], $headers);
    //  return $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
                                
  }
public static function sendMail_cci($to, $code, $title,$nom , $prenom){
	  $config = \Drupal::config('notemail.settings');
      $mailManager = \Drupal::service('plugin.manager.mail');
      $module = 'notemail';
      $key = 'create_article';
      $to = $to;
       $logo = 'https://aunador.ma/themes/au/images/logo.png';
      $params['message'] = Markup::create("<html lang='en'><head><title> ZZ </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='https://aunador.ma/themes/au/images/logo.png' >
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
                                                            <span style='font-size:12pt;'> Demande de la part : " . $nom  . " " . $prenom . " </span></br>
                                                        </font>
                                                    </div>
													<div style='margin:0;'>
                                                        <font size='3' face='Helvetica,sans-serif''>
															<span style='font-size:12pt;'> E-mail : " . $to . " </span>
                                                        </font>
                                                    </div>
                                                    <div style='margin:0;'>
                                                        <font size='3' face='Helvetica,sans-serif''>
                                                            <span style='font-size:12pt;'> " . str_replace("[code]", $code, $config->get('message_mail')['value']) . " </span>
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
                                </div></body></html>");
      $params['node_title'] = $title;
      $langcode = \Drupal::currentUser()->getPreferredLangcode();
      $send = true;
      $reply = NULL;
      $tt = \Drupal::config('system.site')->get('mail');
      $headers = "From: ". $tt . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";
	  $controller = new MainController();
	  $too = array(); 
	  foreach($controller->getMailsByRoleCci() as $user){
	    $too[] = $user->get('mail')->value;
	//	print_r($emails); echo "</br>";
	}
//$too  = array('dardari.mourad@gmail.com','m.dardari@tequality.ma');
foreach($too as $email){
                                //  var_dump($email); echo "</br>";
										$mailManager->mail($module, $key, $email, $langcode, $params , $reply, $send,$headers);
								//	echo "ok";
                                }


	
	//return $mailManager->mail($module, $key, $user->get('mail')->value, $langcode, $params, NULL, $send);
  }

public static function sendMailFinal($to, $code, $title,$note){
	$config = \Drupal::config('notemail.settings');
      $mailManager = \Drupal::service('plugin.manager.mail');
      $module = 'notemail';
      $key = 'send_note';
      $logo = 'https://aunador.ma/themes/au/images/logo.png';
 
        $search_ht  = array('https://', 'http://');
        $replace_ht = array('', '');
        $e_note_lik = str_replace($search_ht,$replace_ht,$note);
        $search  = array('[code]', '[e_note]');
        $replace = array($code, $e_note_lik);
      $params['message'] = Markup::create("<html lang='en'><head><title> AUNADOR </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='https://aunador.ma/themes/au/images/logo.png' >
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
                                                             <span style='font-size:12pt;'> " . str_replace($search, $replace, $config->get('sendMailFinal')['value']) . " </span>
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
                                </div></body></html>");
       $params['node_title'] = "AUNADOR - E-note";
      $langcode = \Drupal::currentUser()->getPreferredLangcode();
      $send = true;
      $attachments_note = array(
     'filecontent' => file_get_contents($note),
     'filename' => 'note-' . $code. '.pdf',
     'filemime' => 'application/pdf',);
      $params['attachments'][] = $attachments_note;
      $ccmail = $config->get('emailcci');
      $ccmail_m = "mourad.dardari@gmail.com";
      $message['headers']['Cc'] = $ccmail;
	  $from_send = 'e_services@aunador.ma';
	    $headers = "From: ". $from_send . "\r\n" .
	        "Bcc: " . $ccmail . "\r\n" .
	        "Cc: " . $ccmail_m . "\r\n" .
	        "Content-Type: text/html; charset=UTF-8; format=flowed ". "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";
	  $subject = "=?UTF-8?B?" . base64_encode($config->get('subject')) . "?=";
	  return $result = mail($to, $subject, $params['message'], $headers);

  if ( ! $result['result']) {
    $message = t('There was a problem sending your email notification to @email for creating node @id.', array('@email' => $to));
    \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('notemail')->error($message);
    return;
  }else {
                    \Drupal::messenger()->addMessage(t('Your message has been sent to  @email.', array('@email' => $to)));
                  }


    
    
  }
 public static function sendMailFinal_cci($to, $code, $title,$note,$nom , $prenom){
	$config = \Drupal::config('notemail.settings');
      $mailManager = \Drupal::service('plugin.manager.mail');
      $module = 'notemail';
      $key = 'create_article';
      $logo = 'https://aunador.ma/themes/au/images/logo.png';
      $params['message'] = Markup::create("<html lang='en'><head><title> ZZ </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='https://aunador.ma/themes/au/images/logo.png' >
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
                                                            <span style='font-size:12pt;'> Demande de la part : " . $nom  . " " . $prenom . " </span></br>
                                                        </font>
                                                    </div>
													<div style='margin:0;'>
                                                        <font size='3' face='Helvetica,sans-serif''>
															<span style='font-size:12pt;'> E-mail : " . $to . " </span>
                                                        </font>
                                                    </div>
													<div style='margin:0;'> 
                                                        <font size='3' face='Helvetica,sans-serif''>
                                                             <span style='font-size:12pt;'> " . str_replace("[code]", $code, $config->get('sendMailFinal')['value']) . " </span>
                                                        </font>
														<font size='3' face='Helvetica,sans-serif''>
                                                            <span style='font-size:12pt;'>votre e-note : <a href='" . $note . "'>E-note</a></span>
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
                                </div></body></html>");
                                
                                
                                
                                
                                
      $params['node_title'] = $title;
      $langcode = \Drupal::currentUser()->getPreferredLangcode();
      $send = true;
            $reply = NULL;
       $tt = \Drupal::config('system.site')->get('mail');
      $headers = "From: ". $tt . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";
	  $controller = new MainController();
	  $too = array(); 
	  
	  foreach($controller->getMailsByRoleCci() as $user){
	    $too[] = $user->get('mail')->value;
	}
foreach($too as $email){                               
										$mailManager->mail($module, $key, $email, $langcode, $params , $reply, $send,$headers);
                                }
  }
  
  public static function sendSMSFinal($number, $code){
    $config = \Drupal::config('notemail.settings'); 
$sid    = "AC6b26dc985a5921ba938a9ebced1c5536";
$token  = "7d90cf0da5c42a69ce7e8d673848a665";
$twilio = new Client($sid, $token);
    try { 
    $result =  $twilio->messages
                ->create($number,
                           array("from" => "aunador", "body" => str_replace("[code]", $code, $config->get('message_phone_final')))
                  );
                  return $result;
  
  } catch (\Twilio\Exceptions\RestException $e) {
            $message = t('There was a problem sending your sms notification.');
   // \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('notemail')->error($message);
    return;
     }
  }
  public static function sendSMSAnnulerpaiement($number, $code){
 $config = \Drupal::config('notemail.settings');    
$sid    = "AC6b26dc985a5921ba938a9ebced1c5536";
$token  = "7d90cf0da5c42a69ce7e8d673848a665";
$twilio = new Client($sid, $token);
 try { 
    $result =  $twilio->messages
                ->create($number,
                           array("from" => "aunador", "body" => str_replace("[code]", $code, $config->get('sendSMSAnnulerpaiement')))
                  );
                  return $result;
 } catch (\Twilio\Exceptions\RestException $e) {
            $message = t('There was a problem sending your sms notification.');
   // \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('notemail')->error($message);
    return;
     }
  }
  
  public static function sendMailAnnulerpaiement($to, $code, $title){
	  $config = \Drupal::config('notemail.settings');
      $mailManager = \Drupal::service('plugin.manager.mail');
      $module = 'notemail';
      $key = 'create_article';
      $logo = ';wwwaunador.org/themes/au/images/logo.png';
      $params['message'] = Markup::create("<html lang='en'><head><title> ZZ </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='https://aunador.ma/themes/au/images/logo.png' >
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
														<span style='font-size:12pt;'> " . $config->get('sendMailAnnulerpaiement')['value'] . " </span>
                                                           
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
                                </div></body></html>");
      $params['node_title'] = $title;
      $langcode = \Drupal::currentUser()->getPreferredLangcode();
      $send = true;
	  $ccmail = $config->get('emailcci');
	    $headers = "From: ". $to . "\r\n" .
            "Bcc: " . $ccmail . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";

      //  $subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
		$subject = "=?UTF-8?B?" . base64_encode($config->get('subject')) . "?=";
      //return $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
	  $subject = "=?UTF-8?B?" . base64_encode($config->get('subject')) . "?=";
      return mail($to, $subject, $params['message'], $headers);
      //return $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
  }
 public static function sendMailAnnulerpaiementAvecMotif($to, $code, $title,$motif){
	  $config = \Drupal::config('notemail.settings');
      $mailManager = \Drupal::service('plugin.manager.mail');
      $module = 'notemail';
      $key = 'create_article';
      $logo = 'https://aunador.ma/themes/au/images/logo.png';
        $search  = array('[motif]');
  $replace = array($motif);
      $params['message'] = Markup::create("<html lang='en'><head><title> ZZ </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='https://aunador.ma/themes/au/images/logo.png' >
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
														<span style='font-size:12pt;'> " . str_replace($search, $replace, $config->get('sendMailAnnulerpaiementMotif')['value']) . " </span>
                                                           
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
                                </div></body></html>");
      $params['node_title'] = $title;
      $langcode = \Drupal::currentUser()->getPreferredLangcode();
      $send = true;
	  $ccmail = $config->get('emailcci');
	  $tt = \Drupal::config('system.site')->get('mail');
	    $headers = "From: ". $tt . "\r\n" .
            "Bcc: " . $ccmail . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";

      //  $subject = "=?UTF-8?B?" . base64_encode($subject) . "?=";
	//	$subject = "=?UTF-8?B?" . base64_encode($config->get('subject')) . "?=";
      //return $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
	  $subject = "=?UTF-8?B?" . base64_encode($config->get('subject')) . "?=";
      return mail($to, $subject, $params['message'], $headers);
      //return $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
  } 
 public static function sendMailAnnulerpaiement_cci($to, $code, $title,$nom , $prenom,$motif){
	  $config = \Drupal::config('notemail.settings');
      $mailManager = \Drupal::service('plugin.manager.mail');
      $module = 'notemail';
      $logo = 'https://aunador.ma/themes/au/images/logo.png';
      $key = 'create_article';
      $search  = array('[motif]','[nom]' ,'[prenom]' ,'[to]' );
      $replace = array($motif ,$nom , $prenom,$to);
      $params['message'] = Markup::create("<html lang='en'><head><title> ZZ </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='https://aunador.ma/themes/au/images/logo.png' >
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
														<span style='font-size:12pt;'> " . str_replace($search, $replace, $config->get('sendMailAnnulerpaiementCci')['value']) . " </span>
                                                           
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
                                </div></body></html>");
      $params['node_title'] = $title;
      $langcode = \Drupal::currentUser()->getPreferredLangcode();
      $send = true;
      $reply = NULL;
       $tt = \Drupal::config('system.site')->get('mail');
      $headers = "From: ". $tt . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";
	  $controller = new MainController();
	  	  $too = array(); 
	  foreach($controller->getMailsByRoleCci() as $user){
	    $too[] = $user->get('mail')->value;
	}
foreach($too as $email){                               
									$mailManager->mail($module, $key, $email, $langcode, $params , $reply, $send,$headers);
                                }
  }
 
}
