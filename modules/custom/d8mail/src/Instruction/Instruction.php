<?php

namespace Drupal\d8mail\Instruction;

//require_once '/home/clients/6a4bc57ff0996f843d4507bc1f2b5951/aubm/vendor/autoload.php';
//require __DIR__ . '/vendor/autoload.php';
//echo (require __DIR__);
//use Twilio\Rest\Client;

use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Mail\MailFormatHelper;
use Drupal\Core\Site\Settings;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\node\Entity\Node;



class Instruction{
	  const SETTINGS = 'd8mail.settings';

  public static function sendMail($to, $code, $title){
	  $config = \Drupal::config('d8mail.settings');
	  $mailManager = \Drupal::service('plugin.manager.mail');

  $module = 'd8mail';
  $key = 'node_insert';
  $to = $to; 
  $params['message'] = "<html lang='en'><head><title> Agence Urbaine de Meknès </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='http://aumk.tequality.ma/themes/au/images/logo.jpg' >
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
                                </div></body></html>";
  $params['node_title'] = "Pré-instruction";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;

  $result = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
  if ( ! $result['result']) {
    $message = t('There was a problem sending your email notification to @email for creating node @id.');
    \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('d8mail')->error($message);
    return;
  }

  $message = t('An email notification has been sent to @email for creating node @id.');
//  \Drupal::messenger()->addMessage($message);
  \Drupal::logger('d8mail')->notice($message);

  }

public static function sendMailFinal($to, $code, $title){
	$config = \Drupal::config('d8mail.settings');
	  $mailManager = \Drupal::service('plugin.manager.mail');

  $module = 'd8mail';
  $key = 'node_insert';
  $to = $to; 
      $params['message'] = "<html lang='en'><head><title> Agence Urbaine de Meknès </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='http://aumk.tequality.ma/themes/au/images/logo.jpg' >
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
                                                             <span style='font-size:12pt;'> " . str_replace("[code]", $code, $config->get('sendMailFinal')['value']) . " </span>
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
      $params['node_title'] = "Pré-instruction";
  $langcode = \Drupal::currentUser()->getPreferredLangcode();
  $send = true;

  $result = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
  if ( ! $result['result']) {
    $message = t('There was a problem sending your email notification to @email for creating node @id.');
  //  \Drupal::messenger()->addMessage($message, 'error');
    \Drupal::logger('d8mail')->error($message);
    return;
  }

  $message = t('An email notification has been sent to @email for creating node @id.');
  \Drupal::messenger()->addMessage($message);
  \Drupal::logger('d8mail')->notice($message);
  }
 public static function sendMailFinal_cci($to, $code, $title,$note,$extrait,$reglement,$nom , $prenom){
	$config = \Drupal::config('d8mail.settings');
      $mailManager = \Drupal::service('plugin.manager.mail');
      $module = 'd8mail';
      $key = 'create_article';
      $params['message'] = "<html lang='en'><head><title> Agence Urbaine de Meknès </title></head><body><div>
                                    <table style='width:525pt;' cellspacing='0' cellpadding='0' border='0' width='875'>
                                        <tbody>
                                            <tr style='height:30pt;' height='50'>
                                                <td valign='top'>
                                                    <div style='margin:0;'>
                                                        <img src='http://aumk.tequality.ma/themes/au/images/logo.jpg' >
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
                                                            <span style='font-size:12pt;'>votre Instruction : <a href='" . $note . "'>Instruction</a></span>
                                                        </font>
														<font size='3' face='Helvetica,sans-serif''>
                                                            <span style='font-size:12pt;'>votre Extrait : <a href='" . $extrait . "'>Extrait</a></span>
                                                        </font>
														<font size='3' face='Helvetica,sans-serif''>
                                                            <span style='font-size:12pt;'>votre Régelement :  <a href='" . $reglement . "'>Régelement</a></span>
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
      $params['node_title'] = $title;
      $langcode = \Drupal::currentUser()->getPreferredLangcode();
      $send = true;
	  $controller = new MainController();
	  $too = array(); 
	  foreach($controller->getMailsByRoleTechVer() as $user){
	    $too[] = $user->get('mail')->value;
	}
foreach($too as $email){                               
									$mailManager->mail($module, $key, $email, $langcode, $params, NULL, $send);
                                }
  }
  

}
