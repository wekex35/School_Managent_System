<?php
include_once 'database_info.php';
$q =  $_POST['q'];
if ($q == "ups") {
	$id = $_POST['id'];
	include_once 'modal_update_student.php';
}elseif ($q == "upt") {
	$id = $_POST['id'];
	include_once 'modal_update_teacher.php';
}elseif ($q == "upc") {
	$id = $_POST['id'];
	include_once 'modal_update_class.php';
}elseif ($q == "upd") {
	$id = $_POST['id'];
	include_once 'modal_update_driver.php';
}




?>