<?php
include("../base.php");
$MerchantID = 'مرچند کد';
$Amount = 5000;
$Authority = $_GET['Authority'];
$user = $_GET['id'];
if ($_GET['Status'] == 'OK'){
$client = new SoapClient('https://www.zarinpal.com/pg/StartPay/', ['encoding' => 'UTF-8']);
$result = $client->PaymentVerification(
[
'MerchantID' => $MerchantID,
'Authority' => $Authority,
'Amount' => $Amount,
]
);

if ($result->Status == 100){
echo file_get_contents("payComplete30.html");

sendMessage("$user","📍 پرداخت شما موفقیت امیز بود 
🎉 میزارن شارژ خریداری شد : 30 روز
ℹ️اگر ایدی گروه خود را نمیدانید من را به گروهتان دعوت کنید
📌 لطفا ایدی گروه خود را ارسال کنید 
🔆 مثال :
-1001073263482");
sendMessage($Dev[0],"📍 یک خرید انجام شد
🎉 میزارن شارژ خریداری شد : 30 روز
📌 توسط : [$user](tg://user?id=$user)","MarkDown");
file_put_contents("../data/$user.txt","true");
} else {
echo file_get_contents("paysend.html");
}
} else {
echo file_get_contents("payment.html");
}
?>