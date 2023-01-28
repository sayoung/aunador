<?php

namespace Drupal\commerce_cmi\Controller;

use Drupal\commerce_cmi\Helper\Aunote;
use Drupal\commerce_order\Entity\Order;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


/**
 * Returns response for cmi Form Payment Method.
 */
class CmiCallbackController extends ControllerBase {

    /**
     * @var EntityTypeManagerInterface
     */
    protected $entityTypeManager;

    public function __construct(EntityTypeManagerInterface $entityTypeManager) {
        $this->entityTypeManager = $entityTypeManager;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container) {
        return new static(
            $container->get('entity_type.manager')
        );
    }


    /**
     * cmi callback request.
     *
     * @todo Handle Callback from cmi payment gateway.
     */
    public function CmiCallback() {

        $text="";
        $postParams = array();
        foreach ($_POST as $key => $value){
            array_push($postParams, $key);
        }
        
        	
        if(isset($_POST['oid'])){

            $order_id= $_POST['oid'];
            $order = Order::load($order_id);
			$payment_gateway = $order->get('payment_gateway')->first()->entity;
			$configuration = $payment_gateway->get('configuration');
            $storeKey = trim($configuration['SLKSecretkey']);
            $confirmation_mode = $configuration['confirmation_mode'];
            natcasesort($postParams);
            $hach = "";
            $hashval = "";
            foreach ($postParams as $param){
                $paramValue = html_entity_decode(preg_replace("/\n$/","",$_POST[$param]), ENT_QUOTES, 'UTF-8');

                $hach = $hach . "(!".$param."!:!".$_POST[$param]."!)";
                $escapedParamValue = str_replace("|", "\\|", str_replace("\\", "\\\\", $paramValue));

                $lowerParam = strtolower($param);
                if($lowerParam != "hash" && $lowerParam != "encoding" )	{
                    $hashval = $hashval . $escapedParamValue . "|";
                }
            }


            $escapedStoreKey = str_replace("|", "\\|", str_replace("\\", "\\\\", $storeKey));
            $hashval = $hashval . $escapedStoreKey;

            $calculatedHashValue = hash('sha512', $hashval);
            $actualHash = base64_encode (pack('H*',$calculatedHashValue));
        }
        $retrievedHash = $_POST["HASH"];
        if($retrievedHash == $actualHash && $_POST["ProcReturnCode"] == "00" )	{
            $order->set('state', 'completed' );
            $order->save();
   
       $store_idd = $order->getStoreId(); 
		
	switch ($store_idd) {
	case 1:
         $prestation_id =  $_POST['prestationid'];
			Aunote::dossierpaye($prestation_id);
            break;
    case 2:
        $webform_submission_id =  $_POST['nodeid'];
		Aunote::createnote($webform_submission_id,$order_id);
        break;
    case 3:
         $vnomcomplet =  $_POST['BillToName'];
         $vmail =  $_POST['email'];
         $vtel =  $_POST['tel'];
         
        // $pridcut_title1 =  $_POST['pridcut_title'];
         $pridcut_title = html_entity_decode(preg_replace("/\n$/","",$_POST['pridcut_title']), ENT_QUOTES, 'UTF-8');
        // $pridcut_title = mb_convert_encoding($pridcut_title1, "UTF-8");
         $remarque  =  $_POST['remarque'];
         $adress_user = $_POST['BillToStreet1'];
         $support = $_POST['support'];
         $echelle = $_POST['echelle'];
         $unite = $_POST['unite'];
         $dimension = $_POST['dimension'];
         $cin_fid = $_POST['cin_fid'];
         $product_id = $_POST['product_id'];
         $price = $order->getTotalPrice(); 
        
			Aunote::ventedocum($vnomcomplet,$vmail,$vtel);
			// Aunote::ventedocumbo($vnomcomplet,$vmail,$vtel);
			Aunote::ventedocumbo($vnomcomplet,$vmail,$vtel,$pridcut_title,$remarque);
			Aunote::ventedocum_create_historique($vnomcomplet,$vmail,$vtel,$pridcut_title,$remarque,$adress_user,$support,$echelle,$unite,$price,$dimension,$cin_fid,$product_id, $order_id);
            break;
    case 4:
         $prestation_id =  $_POST['prestationid'];
			Aunote::dossierpaye($prestation_id);
            break;
		} 
    /* 
    	
   

    
    if(isset($_POST['nodeid'])){
$webform_submission_id =  $_POST['nodeid'];
			Helper::createnote($webform_submission_id); }
			            if(isset($_POST['prestationid'])){
$webform_submission_id =  $_POST['prestationid'];
			Helper::createnote($webform_submission_id); } */
           
		$payment_storage = \Drupal::entityTypeManager()->getStorage('commerce_payment');
			$payment_gateway = $order->get('payment_gateway')->first()->entity;
			$payment = $payment_storage->create([
			  'state' => 'completed',
			  'amount' => $order->getTotalPrice(),
			  'payment_gateway' => $payment_gateway->id(),
			  'order_id' => $order->id(),
			  'remote_id' => $_POST['oid'],
			  'remote_state' => $_POST['Response'],
			]); 
		
				$payment->save();

            if($confirmation_mode == "1" ){
				$text = "ACTION=POSTAUTH";
			} else {
				$text = "APPROVED";
			}
			
			

        }else {
			$order->set('state', 'pending' );
			$order->save();
            $text= "APPROVED";
        }

        return new Response($text);

    }

    /**
     * cmi callback request.
     *
     * @todo Handle Callback from cmi payment gateway.
     */
    public function CmiSendData() {
        die('CmiSendData');
    }


    /**
     * cmi callback request.
     *
     * @todo Handle Callback from cmi payment gateway.
     */
    public function CmiOK() {

        $msg= "<h4>Your order was successfully with Payment ID: ".$_POST["acqStan"]."</h4>"  . " <br />\r\n";
        return  array(
            '#type' => 'markup',
            '#markup' => $msg,
        ) ;
    }


    /**
     * cmi callback request.
     *
     * @todo Handle Callback from cmi payment gateway.
     */
    public function CmiFail() {
        die('CmiFail');
    }
}