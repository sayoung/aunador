<?php
/**
 * @file
 * Contains \Drupal\notemail\Controller\PdfController.
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
use Drupal\webform\Entity\Webform;
use Drupal\webform\WebformSubmissionForm;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Messenger\MessengerTrait;
use Drupal\webform\WebformInterface;
use Drupal\webform\WebformSubmissionInterface;
use Drupal\file\Entity\File;
use Drupal\Core\Datetime;


class PdfController extends ControllerBase{

    public function GetPdf()
    {
       // kint($cid);
        $cid = \Drupal::request()->attributes->get('cid');
        
        $node_note = Node::load($cid);

          $note_command = $node_note->get('field_n_command')->value;
          $note_command = $node_note->get('field_n_command')->value;
          $note_nom = $node_note->get('field_nom')->value;
          $note_prenom = $node_note->get('field_prenom')->value;
          $note_cin =  $node_note->get('field_cin')->value;
          $note_tel = $node_note->get('field_phone_number')->value;
          $note_province = $node_note->get('field_prefecture')->value;
          $note_commune = $node_note->get('field_commune')->value;
          $note_email = $node_note->get('field_email')->value;
          $note_suivi = $node_note->get('field_uuid')->value;
          $note_adresse = $node_note->get('field_adresse')->value;
          $note_phone = $node_note->get('field_phone_number')->value;
          $note_qualite = $node_note->get('field_en_qualite')->value;
          $note_qualite_autre = $node_note->get('field_autres')->value;
          $note_motif = $node_note->get('field_motif')->value;
          $note_nature = $node_note->get('field_nature_du_projet_envisage')->value;
          $note_nature_autre = $node_note->get('field_autres_projet')->value;
          $note_refernce = $node_note->get('field_references_foncieres')->value;
          $note_statut = $node_note->get('field_statut_foncier')->value;
          $note_profesion = $node_note->get('field_profession_demandeur')->value;
          $autres_profession = $node_note->get('field_autres_profession')->value;
          $note_mre = $node_note->get('field_marocains_residents_a_l_et')->value;
        


                $html = '<style>
        table.border {
            border-collapse: separate;
            border: unset;
            empty-cells: hide;
            width:100%;
        }
        table.none {
            border-collapse: separate;
            border: unset;
            empty-cells: hide;
            width:100%;
        }
        table.none-6 {
            border-collapse: separate;
            border: unset;
            empty-cells: hide;
            width:60%;
        }
        table.none-4 {
            border-collapse: separate;
            border: unset;
            empty-cells: hide;
            width:40%;
        }
        td {
            border: 1px solid #000;
            padding: 0px;
        }
        td.none {
            border: unset;
            padding: 0px;
        }
        table.collapsed {
            border-collapse: collapse;
        }
        table.collapsed td {
            background-color:#EDFCFF;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
          }
        textarea { width:100%;}
        </style> 
        <table class="none" cellSpacing="2">
            <tbody>
                <tr>
                    <td class="none" style="width:100%;height:100px; padding: 2mm;text-align: center;"><img style="width:50%;" src="sites/default/files/logo.png"   /> </td>
                </tr>
            </tbody>
        </table>
        
    
        <h2 style="text-align: center;">Demande de la part : '. $note_nom   .' ' . $note_prenom .'</h2>';
        $html .= '
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">N° de commande : '. $note_command .'</td>
             
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">Nom complet : '. $note_nom   .' ' . $note_prenom .'</td>
             
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">Pièce d\'identité (CIN, Passeport)  : '. $note_cin .'</td>
             
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">E-mail : '. $note_email .'</td>
             
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">Téléphone mobile  : '. $note_tel .'</td>
             
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">Marocains résidents à l\'étranger  : '. $note_mre .'</td>
             
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">Adresse : '. $note_adresse .'</td>
             
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">En qualite de  : '. $note_qualite .' '. $note_qualite_autre .'</td>
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">Profession demandeur  : '. $note_profesion .' ' . $autres_profession .' </td>
             
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">Statut foncier : '. $note_statut .'</td>
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">Références foncières  : '. $note_refernce .'</td>
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">Collectivité territoriale où se trouve le projet : '. $note_province   .' - ' . $note_commune .'</td>
             
                </tr>
            </tbody>
        </table>
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">Nature du Projet Envisagé  : '. $note_nature .' ' . $note_nature_autre .'</td>
                </tr>
            </tbody>
        </table>
        <b>Motif :</b>
        <textarea  name="textareafield" spellcheck="true" rows="5" cols="80" wrap="virtual" title="Textarea tooltip"> '. $note_motif .' </textarea>
        ';
        

        
$mpdf = new \Mpdf\Mpdf(['tempDir' => 'sites/default/files/tmp']); $mpdf->WriteHTML($html);
$mpdf->showImageErrors = true;
$mpdf->Output($note_command.'.pdf', 'D');
$mpdf->ob_end_clean(); 

}
    }