<?php
include_once 'database_info.php';

if ($q) {
$teacher_table_query =
"CREATE TABLE IF NOT EXISTS `staff` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`name` varchar(100) NOT NULL,
`contact_no` varchar(100) NOT NULL,
`assigned_class` varchar(100) NOT NULL,
`type` varchar(100) NOT NULL,
`email` varchar(100) NOT NULL,
`password` varchar(100) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

$students_table_query =
"CREATE TABLE IF NOT EXISTS `student_info` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`gr_no` varchar(20) NOT NULL,
`house` varchar(20) NOT NULL,
`roll_no` varchar(20) NOT NULL,
`school_uid` varchar(20) NOT NULL,
`std` varchar(20) NOT NULL,
`div` varchar(20) NOT NULL,
`Surname` varchar(100) NOT NULL,
`first_name` varchar(100) NOT NULL,
`fathers_name` varchar(100) NOT NULL,
`mothers_name` varchar(100) NOT NULL,
`dob` varchar(20) NOT NULL,
`religion` varchar(20) NOT NULL,
`caste` varchar(20) NOT NULL,
`category` varchar(20) NOT NULL,
`blood_group` varchar(20) NOT NULL,
`address` varchar(224) NOT NULL,
`sms_contact_no` varchar(20) NOT NULL,
`gen_contact_no` varchar(20) NOT NULL,
`adharcard_no` varchar(20) NOT NULL,
`passowrd` varchar(100) NOT NULL,
`noti_key` varchar(224) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";


$class_manager_table_query =
"CREATE TABLE IF NOT EXISTS `class_manager` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`std` varchar(20) NOT NULL,
`div` varchar(20) NOT NULL,
`teacher_id` varchar(20) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

$driver_manager_table_query =
"CREATE TABLE IF NOT EXISTS `driver_manager` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`vehical_no` varchar(20) NOT NULL,
`contact_no` varchar(20) NOT NULL,
PRIMARY KEY(`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
	# code...
switch ($q) {

  //Create staff Table
	case 't':
	$created =  $dbq -> query($teacher_table_query);
	show($dbq,$created);
    //echo $created;

    //Create Class Table
	case 's':
	$created =$dbq -> query($students_table_query);
	show($dbq,$created);
		break;

	//Create Class Class Manager
	case 'c':
	$created =$dbq -> query($class_manager_table_query);
	show($dbq,$created);
		break;

		case 'd':
	$created =$dbq -> query($driver_manager_table_query);
	show($dbq,$created);
		break;
	//Defult switch	
}
}else{
	echo "Not A Query In If Case";
}

function show($dbq,$created)
{
	if (!$created)
		echo "Error in Creating Table".mysqli_error($dbq);
}
?>
