<?php
session_start();
include_once 'database_info.php';

$q = $_POST['q'];

include_once 'ctable.php';

if ($q === "s") { //insert Studentd Info
$password = substr($_POST['surname'], 0,3)."_".substr($_POST['sms_contact_no'], 0,3);
if(mysqli_num_rows(mysqli_query($dbq,"SELECT * FROM `student_info` WHERE `gr_no`='$_POST[gr_no]' "))===0){
$query = "INSERT INTO `student_info` (`gr_no`,`house`,`roll_no`,`school_uid`,`std`,`div`,`surname`,`first_name`,`fathers_name`,`mothers_name`,`dob`,`religion`,`caste`,`category`,`blood_group`,`address`,`sms_contact_no`,`gen_contact_no`,`adharcard_no`,`passowrd`,`noti_key`)
VALUES ('$_POST[gr_no]','$_POST[house]','$_POST[roll_no]','$_POST[school_uid]','$_POST[std]','$_POST[div]','$_POST[surname]','$_POST[first_name]','$_POST[fathers_name]','$_POST[mothers_name]',
$_POST[dob],'$_POST[religion]','$_POST[caste]','$_POST[category]','$_POST[blood_group]','$_POST[address]','$_POST[sms_contact_no]','$_POST[gen_contact_no]','$_POST[adharcard_no]','$_POST[gr_no]','0')";
	
	insert($dbq,$query);
	}else alex();
}else if ($q === "bs") {
	echo  $_FILES['file_upload']['tmp_name'];
insert($dbq,$query);
}else if ($q === "c") {//insert class Info

	$std = $_POST['std'];
	$div = $_POST['div'];
	$sd = $std."_".$div;
	$teacher_id = $_POST['teacher_id'];
	if(mysqli_num_rows(mysqli_query($dbq,"SELECT * FROM `class_manager` WHERE `std` = '$std' AND `div`='$div' "))===0){
	$dbq -> query("UPDATE `staff` SET `assigned_class` = '$sd' WHERE `id` = '$teacher_id'");
	if(mysqli_affected_rows($dbq) == 0)
		echo  "error";
	$query = "INSERT INTO `class_manager`(`std`,`div`,`teacher_id`) VALUES ('$std','$div', '$teacher_id')";
	insert($dbq,$query);
	}else alex();
}else if ($q === "t") {//teachers info
	
	//$name = $_POST['name'];
	$contact_no = $_POST['contact_no'];
	$type = $_POST['type'];
	$email = $_POST['email'];
	$password= $_POST['password'];
	if(mysqli_num_rows(mysqli_query($dbq,"SELECT * FROM `staff` WHERE `email` = '$email' "))===0){
	
	switch ($type) {
		case '0':$range = "j_s";
			break;
		case '1':$range = "1_5";
			break;
		case '2':$range = "6_10";
			break;
		case '3':$range = "11_12";
			break;
		default:$range = "1";
			break;
	}
	$query = "INSERT INTO `staff`( `name`, `contact_no`, `email`, `password`,`type`,`range`) VALUES ('$_POST[name]', '$contact_no', '$email', '$password','$type','$range')";
	insert($dbq,$query);
	}else alex();
}else if ($q === "d") {//insert drivers
	$name = $_POST['name'];
	$vehical_no = $_POST['vehical_no'];
	$contact_no = $_POST['contact_no'];
	if(mysqli_num_rows(mysqli_query($dbq,"SELECT * FROM `driver_manager` WHERE `vehical_no` = '$vehical_no' "))===0){
	
	$query = "INSERT INTO `driver_manager`(`name`,`vehical_no`,`contact_no`) VALUES ('$name','$vehical_no', '$contact_no')";
	insert($dbq,$query);
	}else alex();
}else if ($q === "tl"/*Teachers Login*/) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = "SELECT * FROM `staff` WHERE `email` = '$email' AND `password` = '$password'";
	 $ret = login($dbq,$query);
	 $_SESSION['login'] = $ret;// $ret['name']
	
}else if ($q === "sl"/*Students Login*/) {
	$query = "SELECT * FROM `student_info` WHERE `sms_contact_no` = '".$_POST['contact']."' AND `password` = '".$_POST['password']."'";
	echo "*".json_encode(login($dbq,$query));
     
}else if ($q === "ups") {//update Students
	$id = $_POST['id'];
	$query = "UPDATE `student_info` SET `gr_no`='$_POST[gr_no]',`house`='$_POST[house]',`roll_no`='$_POST[roll_no]',`school_uid`='$_POST[school_uid]',`std`='$_POST[std]',`div`='$_POST[div]',`surname`='$_POST[surname]',`first_name`='$_POST[first_name]',`fathers_name`='$_POST[fathers_name]',`mothers_name`='$_POST[mothers_name]',`dob`='$_POST[dob]',`religion`='$_POST[religion]',`caste`='$_POST[caste]',`category`='$_POST[category]',`blood_group`='$_POST[blood_group]',`address`='$_POST[address]',`sms_contact_no`='$_POST[sms_contact_no]',`gen_contact_no`='$_POST[gen_contact_no]',`adharcard_no`='$_POST[adharcard_no]' WHERE `id` = '$id'";

		update($dbq,$query);
}elseif ($q === "upt") { // Update Teachers
	$type = $_POST['type'];
	switch ($type) {
		case '0':$range = "j_s";
			break;
		case '1':$range = "1_5";
			break;
		case '2':$range = "6_10";
			break;
		case '3':$range = "11_12";
			break;
		default:$range = "1";
			break;
	}
	$id = $_POST['id'];
	$query = "UPDATE `staff` SET `name`='$_POST[name]',`contact_no`='$_POST[contact_no]',`email`='$_POST[email]',`password`='$_POST[password]',`type`='$_POST[type]',`range`='$range' WHERE `id` = '$id'";
	update($dbq,$query);
}elseif ($q === "upc") { // Update Class
	$id = $_POST['id'];
	$query = "UPDATE `class_manager` SET `std`='$_POST[st]',`div`='$_POST[div]',`teacher_id`='$_POST[teacher_id]' WHERE `id` = '$id'";
	update($dbq,$query);
}elseif ($q === "upd") { // Update Drivers
	$id = $_POST['id'];
	$query ="UPDATE `driver_manager` SET `name`='$_POST[name]',`vehical_no`='$_POST[vehical_no]',`contact_no`='$_POST[contact_no]' WHERE `id` = '$id'";
	update($dbq,$query);
}

function update($dbq,$query)
{
	$created = $dbq -> query($query) or die("Error ".mysqli_error($dbq));
	if(mysqli_affected_rows($dbq) !== 0){
		echo "Updated";
	}

}


function login($dbq,$query){
	$isLogin =$dbq -> query($query);
if (!$isLogin) {
		echo "Database Error";
	}else{
		if(mysqli_affected_rows($dbq) == 0){
			echo "Wrong Credential";
		}else{
		$dato = mysqli_fetch_array($isLogin);
		echo "Successful";
		return $dato;
		}
	}
}

function insert($dbq,$query){
$created =$dbq -> query($query);
	show1($dbq,$created);
}

function show1($dbq,$created)
{
	if (!$created)
		echo "<div> Unable to insert Data".mysqli_error($dbq)."</div>"; 
	else
		echo "Successful";
}

function alex(){
	echo "Already Exists";
}
?>