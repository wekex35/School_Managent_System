<?php
echo $_POST['name']."\t";
echo $_POST['name']."*";
echo $_POST['name']."\t";
echo $_POST['name'];
include_once 'database_info.php';
$result = $dbq -> query("SELECT * FROM `msg_noti`");//(`contact_no`, `title`, `msg`)
while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
     		echo $row['title']."\t".$row['msg']."*";

     	}
?>