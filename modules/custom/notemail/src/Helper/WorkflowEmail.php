<?php

namespace Drupal\notemail\Helper;
require_once '/opt/drupal/vendor/autoload.php';
//require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Site\Settings;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\notemail\Controller\MainControllerWorflow;
use Drupal\Component\Render\FormattableMarkup;
use Drupal\node\Entity\Node;
use Drupal\Core\Mail\MailManagerInterface;
use Drupal\Core\Render\Markup;
use Drupal\Core\Mail\MailFormatHelper;

Class WorkflowEmail{

 const MAILSETTINS = 'workflow.settings';
	  




    public static function sendMailWorflow($note_email,$note_prenom,$note_nom, $note_suivi,$note_province,$note_command,$note_etape ){
        $config = \Drupal::config('workflow.settings');
        $mailManager = \Drupal::service('plugin.manager.mail');
        $module = 'notemail';
        $key = 'sendMailWorflow';
        $logo = 'https://aunador.ma/themes/au/images/logo.png';
        if ($note_etape == "checking") {
            $note_etape_m = "Vérification";
        } elseif ($note_etape == "comptabilite") {
            $note_etape_m = "Comptabilité";
        } elseif ($note_etape == "traitement") {
            $note_etape_m = "Traitement";
        }elseif ($note_etape == "validation") {
            $note_etape_m = "Validation";
        }elseif ($note_etape == "dispatcheur") {
            $note_etape_m = "Traitée";
        }elseif ($note_etape == "annulation") {
            $note_etape_m = "Annulation";
        }elseif ($note_etape == "article_4") {
            $note_etape_m = "article 4";
        }elseif ($note_etape == "verification_par_cs_") {
            $note_etape_m = "Verification par CS";
        }elseif ($note_etape == "enregistrement_bo") {
            $note_etape_m = "Enregistrement BO";
        }
                
        $search  = array('[email_client]','[prenom]', '[nom]' , '[code]','[province]', '[n_command]','[etape]');
        $replace = array($note_email,$note_prenom,$note_nom, $note_suivi,$note_province,$note_command,$note_etape_m);
        $params['message'] = "<html lang='en'><head><title>  </title></head><body><div>
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
                                                                    <span style='font-size:12pt;'> " . str_replace($search, $replace, $config->get('sendMailWorflow')['value'] ?? '') . " </span>
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
        $params['node_title'] = "E-Note : " . $note_etape_m . " N commande :   " . $note_command;

        $langcode = \Drupal::currentUser()->getPreferredLangcode();
        $send = true;
        $ccmail = $config->get('emailcci');
        $reply = NULL;
        $from_send = 'e_services@aunador.ma';
        $message['headers']['Content-Type'] = 'text/html; charset=UTF-8; format=flowed; delsp=yes';
        $headers = "From: ". $from_send . "\r\n" .
                    "MIME-Version: 1.0" . "\r\n" .
                    "Content-type: text/html; charset=UTF-8" . "\r\n";
        $subject_info = "E-Note : " . $note_etape_m . " N commande :   " . $note_command;
        $subject = "=?UTF-8?B?" . base64_encode($subject_info) . "?=";

        $controller = new MainControllerWorflow();
        $too = array(); 
            
            foreach($controller->getMailsByRoleTech($note_province,$note_etape) as $user){
                $too[] = $user->get('mail')->value;
                
            }

	
			            foreach($too as $email){
             
                
                //  var_dump($email); echo "</br>";
                $result =  mail($email, $subject, $params['message'], $headers);
               // mail($email, $subject, $params['message'], $headers);
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
    }
}