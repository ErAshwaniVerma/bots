<?php

$path = "https://api.telegram.org/bot1519513951:AAG_W2RwaeyEL_AvyQ4S9sIQRTnrSQQ0woQ";

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$u_id = $update["message"]["from"]["first_name"];

/*
if (strpos($message, "/weather") === 0) {
$location = substr($message, 9);
$weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$location."&appid=mytoken"), TRUE)["weather"][0]["main"];
file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the weather in ".$location.": ". $weather);
}*/

$txt = "";
if(strpos($message, "/start") === 0){
    $txt = urlencode("Hello ".$u_id."\nCheck out this /CMD");    
}else if(strpos($message, "/CMD") === 0){
    $txt = urlencode("Hi there this is a testominal command \n \n \n This the list of created commands :- \n \n 1./start \n 2./CMD \n \n Thank you..");    
}
file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$txt);
?>