<?php
include_once 'database_info.php';

$q = $_POST['q'];
if ($q == "uk") { //Update Notification Key
	$api = $_POST['api'];
	$id =  $_POST['id'];
	$query = "UPDATE `student_info` SET `noti_key` = '$api' WHERE `id` = '1'";
	make_query($dbq,$query);
}

function make_query($dbq,$query){
	$result = $dbq -> query($query);
	if (!$result) {
		echo "Error in Updating ".mysqli_error($dbq);
	}else{
		echo "Updated";
	}
}

?>