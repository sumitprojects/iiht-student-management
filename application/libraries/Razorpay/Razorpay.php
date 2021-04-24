<?php 

// GETTING PAYTM KEYS


require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


$razorpay_keys = get_settings('razorpay_keys');
$razorpay_keys = json_decode($razorpay_keys, true);

define('RAZORPAY_MODE'      , $razorpay_keys[0]['RAZORPAY_MODE']); // PROD
define('RAZORPAY_KEY'     , $razorpay_keys[0]['RAZORPAY_KEY']); //Change this constant's value with Merchant key received from Paytm.
define('RAZORPAY_SECRET'     , $razorpay_keys[0]['RAZORPAY_SECRET']); //Change this constant's value with MID (Merchant ID) received from Paytm.
define('RAZORPAY_CURRENCY' , $razorpay_keys[0]['RAZORPAY_CURRENCY']); //Change this constant's value with Website name received from Paytm.


function get_razorpay_api(){
    return new Api(RAZORPAY_KEY,RAZORPAY_SECRET); 
}