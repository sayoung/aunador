<?php
/**
 * @file
 * Contains \Drupal\md_new_prestation\Controller\PdfController.
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
use Drupal\webform_product\Plugin\WebformHandler;
use Drupal\webform\Entity\Webform;
use Drupal\webform\WebformSubmissionForm;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\Core\Messenger\MessengerTrait;
use Drupal\webform\WebformInterface;
use Drupal\webform\WebformSubmissionInterface;
use Drupal\webform_product\Plugin\WebformHandler\WebformProductWebformHandler;

use Drupal\file\Entity\File;
use Drupal\Core\Datetime;
use Drupal\commerce_product\Entity\Product;
use Drupal\commerce_product\Entity\ProductVariation;


class PdfController extends ControllerBase{

    public function GetPdf()
    {
       // kint($cid);
        $cid = \Drupal::request()->attributes->get('cid');
        $product = Product::load($cid);
       // kint($product->get('field_ndeg_de_dossier')->getString());
       // kint($product->get('field_ndeg_de_dossier')->getValue()[0]['value']);
      //  die;
        $Ndossier = $product->get('field_ndeg_de_dossier')->getValue()[0]['value'];
        $nom = $product->get('field_nom_du_petitionnaire')->getValue()[0]['value'];
        $cin = $product->get('field_cin')->getValue()[0]['value'];
        $commune = $product->get('field_commune')->getValue()[0]['value'];
        $province = $product->get('field_prefecture')->getValue()[0]['value'];
        $n_interne = $product->get('field_ndeg_interne_de_projet')->getValue()[0]['value'];
        $date_decision = $product->get('field_date_de_decision')->getValue()[0]['value'];
        $projet = $product->get('field_projet')->getValue()[0]['value'];
        $surface = $product->get('field_surface_plancher_calculee_')->getValue()[0]['value'];
        $valide_par = $product->get('field_valider_par')->getValue()[0]['value'];

        $html = '<style>
        table.border {
            border-collapse: separate;
            border: unset;
            padding: 3px;
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
        </style>

        
        <table class="none" cellSpacing="2">
            <tbody>
                <tr>
                    <td class="none" style="width:100%;height:250px; padding: 2mm;text-align: center;"><img style="width:50%;" src="sites/default/files/logo_2.png"   /> </td>
             
                </tr>
            </tbody>
        </table>
        
    
        <h2 style="text-align: center;">FICHE TECHNIQUE DE PROJET</h2>';
        $html .= '
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="border-right: 1px solid #000; width:100%; padding: 2mm;">N° dossier Rokhas : '. $Ndossier .'</td>
             
                </tr>
            </tbody>
        </table>';

        $html .= '<table class="none" cellSpacing="2"><tbody >';
        $html .='<tr>
        <td style="width:60%;border:unset;">
            <table  class="border" cellSpacing="2">
                <tbody style="border: 2px solid #000;width:100%;"><tr>
                        <td style="border-right: 1px solid #000; width:100%; padding: 2mm;"> Nom complet : '. $nom .'</td>
                        
                    </tr>
                </tbody>
            </table>
        </td>
        <td style="width:40%;border:unset;">
            <table  class="border" cellSpacing="2">
                <tbody style="border: 2px solid #000;width:100%;"><tr>
                        <td style="border-right: 1px solid #000; width:100%; padding: 2mm;"> N° CNIE : '. $cin .'</td>
                        
                    </tr>
                </tbody>
            </table>
        </td>
        </tr>';
        $html .='<tr>
            <td style="width:60%;border:unset;">
                <table  class="border" cellSpacing="2">
                    <tbody style="border: 2px solid #000;width:100%;">
                        <tr>
                            <td style="border-right: 1px solid #000; width:100%; padding: 2mm;"> Province : '. $province .'</td>
                        
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="width:40%;border:unset;">
                <table  class="border" cellSpacing="2">
                    <tbody style="border: 2px solid #000;width:100%;">
                        <tr>
                            <td style="border-right: 1px solid #000; width:100%; padding: 2mm;"> Commune : '. $commune .'</td>
                        
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>';
        
        $html .='<tr>
            <td style="width:50%;border:unset;">
                <table  class="border" cellSpacing="2">
                    <tbody style="border: 2px solid #000;width:100%;">
                        <tr>
                            <td style="border-right: 1px solid #000; width:100%; padding: 2mm;"> N° interne de projet : '. $n_interne .'</td>
                        
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="width:50%;border:unset;">
                <table  class="border" cellSpacing="2">
                    <tbody style="border: 2px solid #000;width:100%;">
                        <tr>
                            <td style="border-right: 1px solid #000; width:100%; padding: 2mm;"> Date de décision : '. $date_decision .'</td>
                        
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>';
        $html .= '</tbody></table>';
        $html .= '<table class="none" cellSpacing="2"><tbody >';
        $html .='<tr>
            <td style="width:100%;border:unset;">
                <b>Projet :</b>
                <textarea name="authors" rows="5" cols="80" wrap="virtual"  style="width:100%;border:unset;" >'. $projet .'</textarea>
            </td>
        </tr>';
         $html .= '</tbody></table>';
         $html .= '<table class="none" cellSpacing="2"><tbody >';
        $html .='<tr>
            <td style="width:60%;border:unset;">
                <table  class="border" cellSpacing="2">
                    <tbody style="border: 2px solid #000;width:100%;">
                        <tr>
                            <td style="width:50%; padding: 2mm;"> Surface Plancher Calculée (Site Rokhas.ma) M2 : '. $surface .'</td>
                        
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>';
        $html .= '</tbody></table>';
        $html .= '
        <table class="border" cellSpacing="2">
            <tbody>
                <tr>
                    <td style="width:100%;height:250px; padding: 2mm;text-align: center;"><h2> Validé par : '. $valide_par .'</h2> </td>
             
                </tr>
            </tbody>
        </table>';
        $html .= '<br /><br />';
        
$mpdf = new \Mpdf\Mpdf(['tempDir' => 'sites/default/files/tmp']); $mpdf->WriteHTML($html);
$mpdf->showImageErrors = true;
$mpdf->Output($Ndossier.'.pdf', 'D');
$mpdf->ob_end_clean(); 

}
    }