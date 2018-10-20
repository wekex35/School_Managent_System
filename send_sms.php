<?php
include_once 'smsandnotification.php';

if (@$_POST['m']!=="") {
	$m = @$_POST['m'];
	$t = @$_POST['t'];
	get(@$_POST['q'],$t,$m);
}


function get($variable,$t,$m){
	//print_r($variable);
$no = "";
$noti_key = "";
$i = 0;
$insert = "";
if (is_array($variable)) {
	foreach ($variable as $key) {

	$val = explode("(*)", $key);
	
	echo $t = strpos($m, "#");
	if($t !== 0 ){
		
		$insert .= "('$val[0]','$t','$m'),";
	}
	
    
	$true = true;
	if ($i==0){ 
	if($val[1]!=""){
	$noti_key .= $val[1];//Notification Key
	$true = false;
	}

    if($val[0]!=""){
    if($true)
	$no .= $val[0];//Mobile No

	}

	}else{

	if($val[1]!=""){
	$noti_key .= ",".$val[1];//Notification Key
	$true = false;
	}

    if($val[0]!=""){
    if($true)
	$no .= ",".$val[0];//Mobile No

	}
   }
	$i++;
  }
}

  if ($insert != "") {	
  include_once 'database_info.php';
   $query = $dbq -> query("INSERT INTO `msg_noti` (`contact_no`, `title`, `msg`) VALUES ".trim($insert,",")) or die(mysqli_error($dbq));
  }
  

  $num = trim($no,",");
  $noti = trim($noti_key,",");
 echo "<h3>".$num."</h3>";
  echo "<h3>".$noti."</h3>";
  
  if($noti!="")
  send_notifications($m,$t,$noti);
  if($num!="")
  send_sms($m,$t,$num);
}
?>