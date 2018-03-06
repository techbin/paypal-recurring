<?php
//AUTHOR : SATISH KUMAR
//DATE : 21 APRIL 2011
//COMPANY : SLAB TECHSOL SYSTEM
//EMAIL : info@techsolsystem.com
//WEBSITE: www.techsolsystem.com



include "class.paypal_recurring.php";
$obj=new paypal_recurring;

$obj->environment = 'sandbox';	// or 'beta-sandbox' or 'live'
$obj->paymentType = urlencode('Authorization');				// or 'Sale' or 'Order'

// Set request-specific fields.
$obj->startDate = urlencode("2011-9-6T0:0:0");
$obj->billingPeriod = urlencode("Month");				// or "Day", "Week", "SemiMonth", "Year"
$obj->billingFreq = urlencode("4");						// combination of this and billingPeriod must be at most a year
$obj->paymentAmount = urlencode('10');
$obj->currencyID = urlencode('USD');							// or other currency code ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')

/* PAYPAL API  DETAILS */
$obj->API_UserName = urlencode('API KEY');
$obj->API_Password = urlencode('PASSWORD');
$obj->API_Signature = urlencode('SIGNATURE');
$obj->API_Endpoint = "https://api-3t.paypal.com/nvp";

/*SET SUCCESS AND FAIL URL*/
$obj->returnURL = urlencode("http://YOUR DOMAIN URL/index.php?task=getExpressCheckout");
$obj->cancelURL = urlencode('http://YOUR DOMAIN URL/index.php?task=error');


$task="setExpressCheckout"; //set initial task as Express Checkout

switch($task)
{
	case "setExpressCheckout":
	$obj->setExpressCheckout();
	exit;
	case "getExpressCheckout":
	$obj->getExpressCheckout();
	exit;
	case "error":
	echo "setExpress checkout failed";
	exit;
}

?>