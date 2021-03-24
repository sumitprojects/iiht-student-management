<?php 



require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

// GETTING PAYTM KEYS
$razorpay_keys = get_settings('razorpay_keys');
$razorpay_keys = json_decode($razorpay_keys, true);

define('RAZORPAY_MODE'      , $razorpay_keys[0]['RAZORPAY_MODE']); // PROD
define('RAZORPAY_KEY'     , $razorpay_keys[0]['RAZORPAY_KEY']); //Change this constant's value with Merchant key received from Paytm.
define('RAZORPAY_SECRET'     , $razorpay_keys[0]['RAZORPAY_SECRET']); //Change this constant's value with MID (Merchant ID) received from Paytm.
define('RAZORPAY_CURRENCY' , $razorpay_keys[0]['RAZORPAY_CURRENCY']); //Change this constant's value with Website name received from Paytm.


function get_razorpay_api(){
    return new Api(RAZORPAY_KEY,RAZORPAY_SECRET); 
}



// $RAZORPAY_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
// $RAZORPAY_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
// if (RAZORPAY_ENVIRONMENT == 'PROD') {
// 	$RAZORPAY_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
// 	$RAZORPAY_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
// }

// define('RAZORPAY_REFUND_URL', '');
// define('RAZORPAY_STATUS_QUERY_URL', $RAZORPAY_STATUS_QUERY_NEW_URL);
// define('RAZORPAY_STATUS_QUERY_NEW_URL', $RAZORPAY_STATUS_QUERY_NEW_URL);
// define('RAZORPAY_TXN_URL', $RAZORPAY_TXN_URL);
