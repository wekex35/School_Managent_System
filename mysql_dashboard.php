<?php
include_once 'database_info.php';
$dmy = date('Y'."-".'n'."-".'j');
//class
$attend_send = mysqli_num_rows($dbq -> query("SELECT `id` FROM `class_manager` WHERE `date` = '$dmy'"));
$total_class = mysqli_num_rows($dbq -> query("SELECT `id` FROM `class_manager`"));

//Attendance
$total_student = mysqli_num_rows($dbq -> query("SELECT `id` FROM `student_info`"));
$student_present = mysqli_num_rows($dbq -> query("SELECT `id` FROM `attendance` WHERE `date` = '$dmy' AND status ='1' "));
$student_absent = mysqli_num_rows($dbq -> query("SELECT `id` FROM `attendance` WHERE `date` = '$dmy' AND status ='0' "));

//Total No. of Class And Teacher
$t_class = mysqli_num_rows($dbq -> query("SELECT `id` FROM `class_manager`"));
$t_staff = mysqli_num_rows($dbq -> query("SELECT `id` FROM `staff`"));
?>