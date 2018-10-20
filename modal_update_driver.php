 <?php 
$data = mysqli_fetch_array($dbq -> query("SELECT * FROM `driver_manager` WHERE `id` = '$id'"));
 ?>

<form id="form" name="contact" action="" method="post">        
   
<div class="form-row">

	<label for="Name">Name</label>
	<input type="text" placehoder="" class="form-control" name="name" value = "<?php echo $data['name']?>">
   </div>
<div class="form-row">
	<label for="vehical_no">Vehical No :</label>
	<input type="text" placehoder="" class="form-control" name="vehical_no" value = "<?php echo $data['vehical_no']?>">
</div>
<div class="form-row">
	<label for="contact_no.">Contact No.:</label>
	<input type="text" placehoder="" class="form-control" name="contact_no" value = "<?php echo $data['contact_no']?>">
</div>
		<input type="hidden" name="q" value="upd" >
		<input type="hidden" name="id" value="<?php echo $id; ?>" >
		<br>
          <input type="submit" name="sub" id="submit" class="btn btn-primary btn-block" href="login.html"
          value="Update">
</form>



