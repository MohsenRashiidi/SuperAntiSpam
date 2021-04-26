<?php

$MerchantID = 'مرچند کد';
$Description = 'خرید ربات مدیریت گروه';
$Email = 'ایمیل شما';
$Mobile = 'شماره تماس شما';
$CallbackURL = $_GET['callback'];
$Amount = $_GET['amount']; 
$client = new SoapClient('https://de.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
[
'MerchantID' => $MerchantID,
'Amount' => $Amount,
'Description' => $Description,
'Email' => $Email,
'Mobile' => $Mobile,
'CallbackURL' => $CallbackURL,
]
);

if ($result->Status == 100) {
Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
} else {
echo'ERR: '.$result->Status;
}
?>