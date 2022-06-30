<?php
header("Access-Control-Allow-Origin: *");
/**
* Do not forget to set these to your Account credentials.
* It would be better to store these as an admin setting.
**/
define('MERCHANT_ID', 'MUSTARDSEED');
define('MERCHANT_PASSWORD', 'ProdDev@2021!');

define('ENV_TEST', 0);
define('ENV_LIVE', 1);

$environment = ENV_LIVE;

?>

<?php

$errors = array();
$is_link = true;

$parameters = array(
  'merchantid' => MERCHANT_ID,
  'txnid' => $_GET['order_id'],
  'amount' => $_GET['amount'],
  'ccy' => 'PHP',
  'description' => strip_tags('Pay through online banking (BPI, BDO, Metrobank), over the counter, ATM, or non-banking payment channels such as Bayad Center, Cebuana Lhuillier, ECPay, M Lhuillier, Palawan Pawnshop, SM Payment Counters and a lot more. Click to see all participating banks and channels. You may also choose this option if you want to pay in installments via <span style="color:#0000ff !important;text-decoration:underline"><a href="https://tendopay.ph/" target="_blank">TendoPay</a></span>.'),
  'email' => $_GET['user_email'],
);

$fields = array(
  'txnid' => array(
	  'label' => 'Transaction ID',
	  'type' => 'text',
	  'attributes' => array(),
	  'filter' => FILTER_SANITIZE_STRING,
	  'filter_flags' => array(FILTER_FLAG_STRIP_LOW),
  ),
  'amount' => array(
	  'label' => 'Amount',
	  'type' => 'number',
	  'attributes' => array('step="0.01"'),
	  'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
	  'filter_flags' => array(FILTER_FLAG_ALLOW_THOUSAND, FILTER_FLAG_ALLOW_FRACTION),
  ),
  'description' => array(
	  'label' => 'Description',
	  'type' => 'text',
	  'attributes' => array(),
	  'filter' => FILTER_SANITIZE_STRING,
	  'filter_flags' => array(FILTER_FLAG_STRIP_LOW),
  ),
  'email' => array(
	  'label' => 'Email',
	  'type' => 'email',
	  'attributes' => array(),
	  'filter' => FILTER_SANITIZE_EMAIL,
	  'filter_flags' => array(),
  ),
);

//if (isset($_POST['submit'])) 
{
// Check for set values.
foreach ($fields as $key => $value) {
  // Sanitize user input. However:
  // NOTE: this is a sample, user's SHOULD NOT be inputting these values.
  if (isset($_POST[$key])) {
	  $parameters[$key] = filter_input(INPUT_POST, $key, $value['filter'],
		array_reduce($value['filter_flags'], function ($a, $b) { return $a | $b; }, 0));
  }
}

// Validate values.
// Example, amount validation.
// Do not rely on browser validation as the client can manually send
// invalid values, or be using old browsers.
if (!is_numeric($parameters['amount'])) {
  $errors[] = 'Amount should be a number.';
}
else if ($parameters['amount'] <= 0) {
  $errors[] = 'Amount should be greater than 0.';
}

if (empty($errors)) {
  // Transform amount to correct format. (2 decimal places,
  // decimal separated by period, no thousands separator)
  $parameters['amount'] = number_format($parameters['amount'], 2, '.', '');
  // Unset later from parameter after digest.
  $parameters['key'] = MERCHANT_PASSWORD;
  $digest_string = implode(':', $parameters);
  unset($parameters['key']);
  // NOTE: To check for invalid digest errors,
  // uncomment this to see the digest string generated for computation.
  // var_dump($digest_string); $is_link = true;
  $parameters['digest'] = sha1($digest_string);
  $url = 'https://gw.dragonpay.ph/Pay.aspx?';
  if ($environment == ENV_TEST) {
	$url = 'http://test.dragonpay.ph/Pay.aspx?';
  }

  $url .= http_build_query($parameters, '', '&');

  if ($is_link) {
	echo json_encode(['url'=>$url]);
  }
}
}
return;
?>
