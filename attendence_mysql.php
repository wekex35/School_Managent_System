<?php 
include_once 'database_info.php';
$a = trim($_POST['a']);
if ($a!=="aup") {
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$dmy = $year."-".$month."-".$date;
	$result = mysqli_query($dbq,"SELECT * FROM `attendance` WHERE `std`='$_POST[std]' AND `div` = '$_POST[div]' AND `date`='$dmy' ")or die("Error ".mysqli_error($dbq));
	echo $rows = mysqli_num_rows($result);
	$result = mysqli_query($dbq,"SELECT * FROM `class_manager` WHERE `std`='$_POST[std]' AND `div` = '$_POST[div]' AND `date`='$dmy' ") or die("Error ".mysqli_error($dbq)) ;
	echo $rows_class = mysqli_num_rows($result);
	
}
    
//if(mysqli_num_rows(mysqli_query($dbq,"SELECT * FROM `attendance` WHERE `std`='$_POST[std]' AND `div` = '$_POST[div]' AND `date`='$dmy' "))!==0){//if data is available in attence class


if ($a === "ai") { //ai => attendance insert and update class

$date = $_POST['date'];
$month = $_POST['month'];
$year = $_POST['year'];
$dmy = $year."-".$month."-".$date;
$no = $_POST['no'];
$std = $_POST['std'];
$div = $_POST['div'];
$insert = "";
for ($i=0; $i < $no; $i++) { 
	$val =explode("*", $_POST[$i]);
	$insert .= "('$val[0]','$val[1]','$dmy','$std','$div'),";
}

if ($rows === 0) {

$query = "INSERT INTO `attendance` (`status`,`student_id`,`date`,`std`,`div`) VALUES ".trim($insert,",");
    if(insert($dbq,$query)===1){
		//if ($dmy === date('Y'."-".'m'."-".'j')) 
		}
	}
}elseif ($a=="aup") {//Update Attendance
	
		$created =$dbq -> query("UPDATE `attendance` SET `status` = '$_POST[1]' WHERE `id` = '$_POST[atid]' ");
		if(mysqli_affected_rows($dbq))
			echo "Done";

}elseif ($a=="va") { //Retrieve Attendence
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$dmy = $year."-".$month."-".$date;

	$date1 = $_POST['date1'];
	$month1 = $_POST['month1'];
	$year1 = $_POST['year1'];
	$dmy1 = $year1."-".$month1."-".$date1;



	$date = "0000-00-00";

	echo mysqli_num_rows($dbq -> query("SELECT * FROM `attendance` WHERE `std`='$_POST[std]' AND `div` = '$_POST[div]' AND `date` = '$dmy1' ORDER BY `date` ASC"));
	$query = "SELECT * FROM `attendance` WHERE `date` BETWEEN '$dmy' AND '$dmy1' AND  `std`='$_POST[std]' AND `div` = '$_POST[div]' ORDER BY `date` ASC";
	$result = $dbq -> query($query) or die("Error ".mysqli_error($dbq));
 	$i = $j = 0;
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {

		if($row['date'] != $date){
		//	echo "<td>".$row['status']."</td>#";
			$date = $row['date'];
			$dt = explode("-", $date);
			echo "*";
		if ($i==0) {
			echo "<thead><tr id='$j'><th>Name</th><th>".$dt['2']."</th></tr></thead>";
		}else{
			 echo "<th>".$dt['2']."</th>#";
		}
		$i++;
		$j++;
		}
		if ($i==1) {
			echo "<tr id='$j'><td>".getStudent($row['student_id'],$dbq)."</td><td>".$row['status']."</td></tr>";
		}else
			echo "<td>".$row['status']."</td>#";
        
        $j++;
	}
}elseif ($a == "aias") {
	$ui = $_POST['ui'];
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$dmy = $year."-".$month."-".$date;
	$no = $_POST['no'];
	$std = $_POST['std'];
	$div = $_POST['div'];
	$insert = "";
	$smsListp = array();
	$smsLista = array();
	
	for ($i=0; $i < $no; $i++) { 
		$val =explode("*", $_POST[$i]);

		if($val[0] === "1")
		$smsListp[$i] =$_POST["send".$i];
		if($val[0] === "0")
		$smsLista[$i] =$_POST["send".$i];
		$insert .= "('$val[0]','$val[1]','$dmy','$std','$div'),";
	}

	if($ui == "i"){//if not inserted then insert and then send
		if ($rows === 0) {
		$query = "INSERT INTO `attendance` (`status`,`student_id`,`date`,`std`,`div`) VALUES ".trim($insert,",");
		    if(insert($dbq,$query)===1){
			
		}}
		if($rows_class === 0 && $dmy === date('Y'."-".'m'."-".'j')){
		include_once 'send_sms.php';
		get($smsLista,"Attendance ( ".$std." ".$div." )","# Your child is Absent *");
		get($smsListp,"Attendance ( ".$std." ".$div." )","# Your child is Present *");
		$created = $dbq -> query("UPDATE `class_manager` SET `date` = '$dmy' WHERE `std` = '$std' AND `div` = '$div' ") or die("Error ".mysqli_error($dbq)) ;
           //get($variable,$t,$m)
		
		}else{

		 echo "Message Already Sent";}

	}elseif ($ui == "u") {//send msg
		if($rows_class===0 && $dmy === date('Y'."-".'m'."-".'j') ){
		include_once 'send_sms.php';
		get($smsLista,"Attendance ( ".$std." ".$div." )","# Your child is Absent ");
		get($smsListp,"Attendance ( ".$std." ".$div." )","# Your child is Present ");
           //get($variable,$t,$m)
		$created = $dbq -> query("UPDATE `class_manager` SET `date` = '$dmy' WHERE `std` = '$std' AND `div` = '$div' ") or die("Error ".mysqli_error($dbq)) ;
		
		}else{ 

			echo "Message Already Sent"; }
	}
}

function getStudent($id,$dbq){
	$dato = mysqli_fetch_array(mysqli_query($dbq,"SELECT `surname`, `first_name` FROM `student_info` WHERE `id`='$id' ") or die("Error ".mysqli_error($dbq)) );
 return $dato['surname']." ".$dato['first_name'];
}
function insert($dbq,$query){
$created =$dbq -> query($query);
	if (!$created){
		echo "<div> Unable to insert Data".mysqli_error($dbq)."</div>"; 
		return 0;
	}
	else{
		echo "Successful";
		return 1;
	}
}
?>