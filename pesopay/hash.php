<?php
header("Access-Control-Allow-Origin: *");
$actual_link = json_encode($_SERVER);
require_once('SHAPaydollarSecure.php');
//Required Parameter ( with UTF-8 Encoding ) for connect to our payment page
$merchantId='18158372';
$orderRef='MS'.$_GET['order_id'];
$currCode='608';
$amount=$_GET['amount'];
$paymentType='N';
$mpsMode="NIL";
$payMethod="ALL";
$lang="E";
$successUrl="http://localhost:3000/order-payment/pesopay/status/success";
$failUrl="http://localhost:3000/order-payment/pesopay/status/fail";
$cancelUrl="http://localhost:3000/order-payment/pesopay/status/error";
//Optional Parameter for connect to our payment page
$remark="";
$redirect="";
$oriCountry="";
$destCountry="";
$secureHashSecret='Yhxtb1eeyoI2XrHcyS5mCJt8Lt4klnbF';//offered by paydollar
 //Secure hash is used to authenticate the integrity of the transaction information and the identity of the merchant. It is calculated by hashing the combination of various transaction parameters and the Secure Hash Secret.
$paydollarSecure=new SHAPaydollarSecure(); 
$secureHash=$paydollarSecure->generatePaymentSecureHash($merchantId, $orderRef, $currCode, $amount, $paymentType, $secureHashSecret);

echo json_encode(['hash'=>$secureHash,'link'=>$actual_link]);