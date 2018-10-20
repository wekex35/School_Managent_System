<?php
include_once 'smsandnotification.php';
include_once 'database_info.php';
$t = $_POST['t'];

$m = $_POST['m'];
$result = $dbq -> query("SELECT `sms_contact_no`,`noti_key` FROM `student_info`");
$mob = "";
$noti_key ="";
$insert ="";
while($row = $result -> fetch_array(MYSQLI_ASSOC)){
	
	if ($row['noti_key']=="") {
		$mob .=  $row['sms_contact_no'].",";
	}else{
		$noti_key .= $row['noti_key'].",";
	}
}

$query = $dbq -> query("INSERT INTO `msg_noti` (`contact_no`, `title`, `msg`) VALUES ('9009','$t','$m') ") or die(mysqli_error($dbq));
  
echo $mob = trim($mob,",");
echo $noti_key = trim($noti_key,",");

  
  if($noti_key!="")
  send_notifications($m,$t,$noti_key);
  if($mob!="")
  send_sms($m,$t,$mob);


?>