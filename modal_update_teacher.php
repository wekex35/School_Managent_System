 <?php 
$data = mysqli_fetch_array($dbq -> query("SELECT * FROM `staff` WHERE `id` = '$id'"));
//echo $data['type'];

 ?>

<form id="form" name="contact" action="" method="post">        
   
<div class="form-row">

	<label for="Name">Name</label>
	<input type="text" placehoder="" class="form-control" name="name" value = "<?php echo $data['name']
?>">
   </div>

   <div class="form-row">
	<label for="contact_no.">Contact No.:</label>
	<input type="text" placehoder="" class="form-control" name="contact_no" value = "<?php echo $data['contact_no']
?>">
</div>

<div class="form-row">
	<label for="Email">Email :</label>
	<input type="text" placehoder="" class="form-control" name="email" value = "<?php echo $data['email']
?>">
</div>
<div class="form-row">
	<label for="Password">Password :</label>
	<input type="text" placehoder="" class="form-control" name="password" value = "<?php echo $data['password']
?>">
</div>
 		<div class="form-group">
            <label for="exampleInputEmail1">Post as:</label>
            <SELECT class="form-control"  type="drop_down" name="type" >
              <option value="4" <?php if ($data['type']==4) {echo "selected";} ?> >Class Teacher</option>
              <option value="3" <?php if ($data['type']==3) {echo "selected";} ?>>Highery Secodary Head</option>
              <option value="2" <?php if ($data['type']==2) {echo "selected";} ?>>Secondary Head</option>
              <option value="1" <?php if ($data['type']==1) {echo "selected";} ?>>Primary Head</option>
              <option value="0" <?php if ($data['type']==0) {echo "selected";} ?>>Pre-Primary Head</option>
            </SELECT> 
        </div>

		<input type="hidden" name="q" value="upt" >
		<input type="hidden" name="id" value="<?php echo $id; ?>" >
		<br>
          <input type="submit" name="sub" id="submit" class="btn btn-primary btn-block" href="login.html"
          value="Update">
</form>



