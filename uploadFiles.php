<?php
include_once 'database_info.php';
//print_r($_FILES);
$dmy = date('Y'."-".'m'."-".'j');
if($_POST['w']=='s'){
	$sourcePath = @$_FILES['image']['tmp_name'];
	$targetPath = "images/".@$_FILES['image']['name'];
	if(move_uploaded_file($sourcePath,$targetPath)) {
	 $query =$dbq -> query("INSERT INTO `sports` (`title`,`message`,`date`,`images`) VALUES ('$_POST[title]','$_POST[msg]','$dmy','$targetPath')") or die("Error ".mysqli_error($dbq));
	 echo "Uploaded";
	}else{
		echo "Unable To Upload Image";
	}
	

}elseif ($_POST['w']=='g') {
	$count = count($_FILES['image']['tmp_name']);
		for ($i=0; $i <= $count ; $i++) { 
		$sourcePath = @$_FILES['image']['tmp_name'][$i];
		$targetPath = "images/".@$_FILES['image']['name'][$i];

			if(move_uploaded_file($sourcePath,$targetPath)) {
					 $query =$dbq -> query("INSERT INTO `gallery` (`date`,`images`) VALUES ('$dmy','$targetPath')")or die("Error ".mysqli_error($dbq));
				}
		}
		echo "Uploaded";
}

?>