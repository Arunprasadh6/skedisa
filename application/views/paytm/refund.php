<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH."libraries/config_paytm.php");
require_once(APPPATH."libraries/encdec_paytm.php");
require_once(APPPATH."libraries/PaytmChecksum.php");
/*
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
// require_once("PaytmChecksum.php");

$paytmParams = array();

$paytmParams["body"] = array(
    "mid"          => PAYTM_MERCHANT_MID,
    "txnType"      => "REFUND",
    "orderId"      => "256",
    "txnId"        => "20210601111212800110168593102674172",
    "refId"        => "REFUNDID_98765",
    "refundAmount" => "400.00",
);

/*
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "YOUR_MERCHANT_KEY");

$paytmParams["head"] = array(
    "signature"	  => $checksum
);

$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

/* for Staging */
$url = "https://securegw-stage.paytm.in/refund/apply";

/* for Production */
// $url = "https://securegw.paytm.in/refund/apply";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json")); 
$response = curl_exec($ch);
print_r($response);