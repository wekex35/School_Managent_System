<?php
include_once 'database_info.php';

$q = $_POST['q'];
if ($q == "Students") { //To list all Students ?> 
<thead>
            <tr>
               <th>Id</th>
            <?php  if($_GET['p']=="sp"){ ?>
		 		<th>SELECT</th>
			<?php }?>
                  <th>NAME</th>
                  <th>STD/DIV</th>
                  <th>APP</th>
                  <th>ACTION</th>
                </tr>
              </thead><tbody>
	<?php
	$ret = $_SESSION['login'];
	$type =  $ret['type'];
	
	switch ($type) {
		case '0':
		case '1':
		case '2':
		case '3':
			$range = explode("_", $ret['range']);
			 $p0 = @$range['0']; 
			 $p1 = @$range['1']; 
			$query = "SELECT * FROM `student_info` WHERE `std` BETWEEN $p0 AND $p1 ";
			break;
		case '4':
		     $range = explode("_", $ret['assigned_class']);
		   	 $p0 = @$range['0']; 
			 $p1 = @$range['1']; 
			$query = "SELECT * FROM `student_info` WHERE `std` = '$p0' AND `div` = '$p1' ";
			break;
		default:$query = "SELECT * FROM `student_info`";
			break;
	}



	$result = $dbq -> query($query) or die(mysqli_error($dbq));
	
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		echo "<tr id='$row[id]' >";
		echo "<td>".$row['id']."</td>";
		if($_GET['p']=="sp"){ ?>
		<th><input type="checkbox" value="<?php echo $row['sms_contact_no']."(*)".$row['noti_key'];  ?>" name="<?php echo $row['first_name']."".$row['surname'];  ?>" class="mob-no"></th>
		<?php }
		echo "<td>".$row['first_name']." ".$row['surname']."</td>";
		echo "<td>".$row['std']." ".$row['div']."</td>";

				$str = "";
			if ($row['noti_key'] === "") {
				$str = "<span class='form-control alert-danger'>Not Installed</span>";
			} else {
				$str = "<span class='form-control alert-success'> Installed</span>";
			}
			

		echo "<td><span>".$str."</span></td>";
		

	?>
		<th>
			<a href="<?php echo "si_".$row['id'];  ?>"  class="btn alert-info" >VIEW</a>
		</th>
		<?php
		echo "</tr>";
		//echo $row['id'];
	}
	echo "</tbody>";
}elseif($q == "Teachers"){ //To list all Teachers
	?>
<thead>
                <tr>
                  <th>Id</th>
                  <th>NAME</th>
                  <th>Assigned Class</th>
                   <th>ACTION</th>
                </tr>
              </thead><tbody>
	<?php
	$query = "SELECT * FROM `staff`";
	$result = $dbq -> query($query);

	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		echo "<tr id='$row[id]' >";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['assigned_class']."</td>";
		?>
			<th>
			<a href="<?php echo "ti_".$row['id'];  ?>"  class="btn alert-info" >VIEW</a>
		</th>
		<?php
		echo "</tr>";
		//echo $row['id'];

	}
	echo "</tbody>";
}elseif($q == "Class"){ //To list all Class
	?>
<thead>
                <tr>
                  <th>Id</th>
                  <th>STD</th>
                  <th>DIV</th>
                  <th>Teacher Name</th>
                   <th>ACTION</th>
                </tr>
              </thead><tbody>
	<?php
	$query = "SELECT * FROM `class_manager`";
	$result = $dbq -> query($query);

	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		echo "<tr id='$row[id]' >";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['std']."</td>";
		echo "<td>".$row['div']."</td>";
		echo "<td>".$row['teacher_id']."</td>";
		?>
			<th>
			<a href="<?php echo "ci_".$row['id'];  ?>"  class="btn alert-info" >VIEW</a>
		</th>
		<?php
		echo "</tr>";
		//echo $row['id'];

	}
	echo "</tbody>";
}elseif ($q == "si") { //To view full student info
	$id = $_POST['id'];
	echo "<span id='getid' name='des_$id' ></span>";
	echo "<span id='getid2' name='ups_$id' ></span>";
	$array = array("Gr No.","House","Roll No.","School_uid","Std","Div","Surname","First Name","Father's Name","Mothers Name","DOB","Religion","Caste","Category","Blood Group","Address","SMS Contact No","Gen. Contact No","Adharcard No","Passowrd","App");
		$query = "SELECT * FROM `student_info` WHERE `id`='$id'";
	$result = $dbq -> query($query);
	echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		$i=0; 
		$j=-1;
		foreach ($row as $key) {
			if ($i!==0 && $i!==21) {
			echo "<tr><td>".$array[$j]."</td><td>".$key."</td></tr>";	
			}
			if ($i===21) {
				$str = "";
			if ($key === "") {
				$str = "<span class='form-control alert-danger'>Not Installed</span>";
			} else {
				$str = "<span class='form-control alert-success'> Installed</span>";
			}
			echo "<tr><td>".$array[$j]."</td><td>".$str."</td></tr>";
			}	
			
			$i++;
			$j++;
		}

	   }
	   echo "</table>";
	}elseif($q == "Drivers"){ // To list all Drivers
	?>
          <thead>
                <tr>
                  <th>Id</th>
                  <?php  if($_GET['p']=="sd"){ ?>
		 		<th>SELECT</th>
		    	<?php }?>
                  <th>NAME</th>
                  <th>Contact No.</th>
                   <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
	<?php
	$query = "SELECT * FROM `driver_manager`";
	$result = $dbq -> query($query);
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		echo "<tr id='$row[id]' >";
		echo "<td>".$row['id']."</td>";
			if($_GET['p']=="sd"){ ?>
		<th><input type="checkbox" value="<?php echo $row['contact_no']."(*)".$row['noti_key'];  ?>" name="<?php echo $row['name'];  ?>" class="mob-no"></th>
		<?php }
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['contact_no']."</td>";
		?>
		<th><a href="<?php echo "di_".$row['id'];  ?>"  class="btn alert-info" >VIEW</a>
		</th>
		<?php
		echo "</tr>";
		//echo $row['id'];
	}
	echo "</tbody>";


}elseif ($q == "ti") { //To view full teacher info
	$id = $_POST['id'];

	echo "<span id='getid' name='det_$id' ></span>";
	echo "<span id='getid2' name='upt_$id' ></span>";
	$array = array("Id", "Name", "Contact No", "Assigned Class", "Email", "Password","Type","Class Range");
		$query = "SELECT * FROM `staff` WHERE `id`='$id'";
	$result = $dbq -> query($query);
	echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		$i=0;
		foreach ($row as $key) {
			echo "<tr><td>".$array[$i]."</td><td>".$key."</td></tr>";
			$i++;
		}

	   }

	   echo "</table>";
	}elseif ($q == "ci") { //To view full teacher info
	$id = $_POST['id'];

	echo "<span id='getid' name='dec_$id' ></span>";
	echo "<span id='getid2' name='upc_$id' ></span>";
	$array = array("Id", "STD", "DIV", "Assigned Teacher", "email", "password","type","Class Range");
		$query = "SELECT * FROM `class_manager` WHERE `id`='$id'";
	$result = $dbq -> query($query);
	echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		$i=0;
		foreach ($row as $key) {
			
			if ($i !=4) {
				echo "<tr><td>".$array[$i]."</td><td>".$key."</td></tr>";
			$i++;
			}
		}

	   }

	   echo "</table>";
	   }elseif ($q == "di") { //To view full drivers info
	$id = $_POST['id'];
	echo "<span id='getid' name='ded_$id' ></span>";
	echo "<span id='getid2' name='upd_$id' ></span>";
	$array = array("id", "name", "vehical_no", "contact_no");
		$query = "SELECT * FROM `driver_manager` WHERE `id`='$id'";
	$result = $dbq -> query($query);
	echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		$i=0;
		foreach ($row as $key) {
			echo "<tr><td>".$array[$i]."</td><td>".$key."</td></tr>";
			$i++;
		}

	   }
	   echo "</table>";
	}elseif ($q == "des") { //To Delete Student Info
	$id = $_POST['id'];
		$dbq -> query("DELETE FROM `student_info` WHERE `id`='$id'");
		if($dbq -> affected_rows){
			echo "Deleted";
		}
	}elseif ($q == "ded") { //To Delete Driver Info
	$id = $_POST['id'];
		$dbq -> query("DELETE FROM `driver_manager` WHERE `id`='$id'");
		if($dbq -> affected_rows){
			echo "Deleted";
		}
	}elseif ($q == "det") { //To Delete Staff Info
	$id = $_POST['id'];
		$dbq -> query("DELETE FROM `staff` WHERE `id`='$id'");
		if($dbq -> affected_rows){
			echo "Deleted";
		}
	}elseif ($q == "dec") { //To Delete Class Info
	$id = $_POST['id'];
	
	$data = mysqli_fetch_array($dbq -> query("SELECT `teacher_id` FROM `class_manager` WHERE `id` = '$id'"));
	$dbq -> query("UPDATE `staff` SET `assigned_class` = '' WHERE `name` = '$data[teacher_id]'");
	if(mysqli_affected_rows($dbq) == 0)
		echo  "error";
		$dbq -> query("DELETE FROM `class_manager` WHERE `id`='$id'");
		if($dbq -> affected_rows){
			echo "Deleted";
		}
	}elseif ($q == "ta") { //View attendance List
		$date = $_POST['date'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$dmy = $year."-".$month."-".$date;
		
	if(mysqli_num_rows(mysqli_query($dbq,"SELECT * FROM `attendance` WHERE `std`='$_POST[std]' AND `div` = '$_POST[div]' AND `date`='$dmy' "))!==0){//if data is available in attence class
		
		$query = "SELECT * FROM `attendance` WHERE `std`='$_POST[std]' AND `div` = '$_POST[div]' AND `date`='$dmy' ";
	$result = $dbq -> query($query) or die(mysqli_error($dbq));
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		$row1 = mysqli_fetch_array(mysqli_query($dbq,"SELECT * FROM `student_info` WHERE `id`='$row[student_id]' "));
		echo "<tr>";
		echo "<td>".$row1['roll_no']."</td>";
		echo "<td>".$row1['first_name']." ".$row1['surname']."</td>";
		 ?>
		<td><select class="form-control"
		ui="u"
		atid ="<?php echo $row['id']; ?>""
		nameid="<?php echo $row1['id']; ?>"	
		imp="<?php echo $row1['sms_contact_no']."(*)".$row1['noti_key'];  ?>" 
		name="presenty" >
			<option value="1"  >Present</option>
			<option value="0" <?php  if($row['status']==0)echo 'selected="selected"'; ?> >Absent</option>
		</select></td>
	
		<?php
		echo "</tr>";
		//echo $row['id'];
		}//end of while
	}
	else{//Retrieve Attendence
	
	$query = "SELECT * FROM `student_info` WHERE `std`='$_POST[std]' AND `div` = '$_POST[div]' ";
	$result = $dbq -> query($query) or die(mysqli_error($dbq));

	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		echo "<tr id='$row[id]' >";
		echo "<td>".$row['roll_no']."</td>";
		echo "<td>".$row['first_name']." ".$row['surname']."</td>";
		 ?>
		<td><select class="form-control"
		ui="i"
		nameid="<?php echo $row['id']; ?>"	
		imp="<?php echo $row['sms_contact_no']."(*)".$row['noti_key'];  ?>" 
		name="presenty" >
			<option value="1" >Present</option>
			<option value="0" >Absent</option>
		</select></td>
	
		<?php
		echo "</tr>";
		//echo $row['id'];
		}//end of while
	}//end date else
	
}// end of elseif va
elseif ($q=="sprt") {
	$query = "SELECT * FROM `sports` ORDER BY `id` DESC ";
	$result = $dbq -> query($query) or die(mysqli_error($dbq));
$row_json = array();
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
	    $jsonArrayObject = (array('title' => $row['title'], 'message' => $row['message'], 'images' => $row['images']));
		$row_json[] = $jsonArrayObject;//$row['title']."\t".$row['message']."\t".$row['images']."*";
		}
		echo json_encode($row_json);
}elseif ($q=="ga") {
	$query = "SELECT * FROM `gallery` ORDER BY `id` DESC ";
	$result = $dbq -> query($query) or die(mysqli_error($dbq));
    $row_json = array();
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
		$row_json[] = (array( 'images' => $row['images']));
		}
		echo json_encode($row_json);
}elseif ($q=="gadis") { //To display gallery
	$query = "SELECT * FROM `gallery` ORDER BY `id` DESC ";
	$result = $dbq -> query($query) or die(mysqli_error($dbq));
?>
<table id="dataTables">
<thead>
<th>Id</th>
<th>Images</th>
<th>Action</th>
</thead>
<?php
	while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
	    echo "<tr><td>".$row['id']."<td>";
		echo "<td>".$row['images']."<td>";
		echo "<td>".Delete."<td></tr>";
		}
		?>
		</table>
		<?php
}
	/*
<input type="checkbox" imp="<?php echo $row['sms_contact_no']."(*)".$row['noti_key'];  ?>" name="<?php echo $row['id']?>" >
	*/

function make_query($dbq,$query){
	return $result = $dbq -> query($query);
}

?>
 