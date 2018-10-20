<?php

$host = "localhost"; //Your Host
$username = "";//mysql_db username
$password = "";//mysql_db password
$database = "";//mysql_db database_name

$dbq = new mysqli($host,$username,$password,$database);
if (mysqli_connect_error()) {
	die("Connection Error ".mysqli_connect_error());
}

?>