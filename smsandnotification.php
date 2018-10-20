<?php

function send_notifications($message,$title,$notification_ids) {
    $API_ACCESS_KEY = 'AAAA-asCEBI:APA91bHQuS4aB0B4AKYF3q7jDV69zR8iQIXyNBmnLNycvXdVRt9EsF-rvQkt5ZAivnm9qDf712Okmb76A8zKdc_GY8_WVYVeIyt0oI7TLqS_OeMDFZLJUsDe_FMaRlaLcD0xaQ0EuYaYgo7zjftjOpdoLJbfbRJSGQ';
    $data = array(
    'title' => $title,
    'message' => $message
    );

   // $fields = array('to' => '/topics/news', 'priority' => 'high', 'data' => $data );
    $fields = array('to' => $notification_ids, 'priority' => 'high', 'data' => $data );
    json_encode($fields);
    $headers = array(
    'Authorization: key=' . $API_ACCESS_KEY,
    'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $pushResult = curl_exec($ch);
    curl_close($ch);
}

    
function send_sms($message,$title,$numbers) {
    
	// Authorisation details.
	$username = "wekex35@gmail.com";
	$hash = "20bd88f537025ac2ffff14a44f969128370881b711fab7eb4057263cc3ec7113";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	//$sender = "TVMSCL";
	// A single number or a comma-seperated list of numbers
	$message = $title."\n".$message;
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	echo $result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
}

/*
function send_sms1($message,$title,$reciever_phone) {
    //$url="http://".$_SERVER['HTTP_HOST']."/pushsms.php";
    $url="https://smsleads.in/pushsms.php";
    $sms=urlencode($title." ".$message);
    $phones=$reciever_phone;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "username=wekex&password=Smsservice&sender=BEISMS&numbers=$phones&message=$sms");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    echo $response = curl_exec($ch);
    }
*/
?>