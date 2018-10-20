<?php
include 'database_info.php';
if(is_array($_FILES)) {

if(@is_uploaded_file($_FILES['csv']['tmp_name'])) {
//$file['extension'] == "csv"
$sourcePath = @$_FILES['csv']['tmp_name'];
$file = pathinfo($_FILES["csv"]["name"]);
if ($file['extension'] == "csv"){
$targetPath = "csv/".@$_FILES['csv']['name'];
$name = $_FILES['csv']['name'];

if(move_uploaded_file($sourcePath,$targetPath)) {

$query = <<<eof
    LOAD DATA LOCAL INFILE '$targetPath'
     INTO TABLE `student_info`
     FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
     LINES TERMINATED BY '\n'
     IGNORE 1 LINES
    (`gr_no`,`house`,`roll_no`,`school_uid`,`std`,`div`,`surname`,`first_name`,`fathers_name`,`mothers_name`,`dob`,`religion`,`caste`,`category`,`blood_group`,`address`,`sms_contact_no`,`gen_contact_no`,`adharcard_no`)
eof;

$result = $dbq -> query($query) ;
	if (!$result) {
		echo "Error ".mysqli_error($dbq);
	}else{
		echo "Successful <br>";
			$query1 = "SELECT `id`,`surname`,`sms_contact_no` FROM `student_info`";
			$result = $dbq -> query($query1) or die("Error ".mysqli_error($dbq));
			while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {

			 $password = substr($row['surname'], 0,3)."_".substr($row['sms_contact_no'], 0,3);
			$dbq ->  query("UPDATE `student_info` SET `password` = '$password' WHERE `id` = '$row[id]'") or die("Password ".mysqli_error($dbq));
				echo mysqli_affected_rows($dbq);
			}
			
		echo "<span>Note : Password Generated With First 3 characters of Surname, underscore and 3 digits of SMS Contact No. for example if Surname is Patil and SMS Contact no is 8796900000 then Password Will be Pat_879 </span>";
	}//end else
}
}
}
}
?>