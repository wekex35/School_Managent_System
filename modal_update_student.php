 <?php

$data = mysqli_fetch_array($dbq -> query("SELECT * FROM `student_info` WHERE `id` = '$id'"));
         include_once 'std_div.php';
 ?>

<form id="form" name="contact" action="" method="post">        
   
<fieldset class="scheduler-border">
    <legend class="scheduler-border"> Basic Info </legend>
<div class="form-row">
<div class="col-md-6">
	<label for="Gr No">Gr No :</label>
	<input type="text" placehoder="" class="form-control" name="gr_no" value = "<?php echo $data['gr_no']?>">
   </div>
   <div class="col-md-6">
	<label for="House">House :</label>
	<input type="text" placehoder="" class="form-control" name="house" value = "<?php echo $data['house']?>">
</div>
<div class="col-md-6">
	<label for="Roll no.">Roll no.:</label>
	<input type="text" placehoder="" class="form-control" name="roll_no" value = "<?php echo $data['roll_no']?>">
</div>
<div class="col-md-6">
	<label for="School UID">School UID :</label>
	<input type="text" placehoder="" class="form-control" name="school_uid" value = "<?php echo $data['school_uid']?>">
</div>
<?php if($type != '4') {?>
 <div class="col-md-6">
	<label>STD</label>
            <?php echo $std; ?>
	
</div>
<div class="col-md-6">
	 <label>DIV</label>
            <?php echo $select_div; ?>
</div>
<?php } ?>
</div>
</fieldset>

<fieldset class="scheduler-border">
    <legend class="scheduler-border"> Personal Info </legend>
<div class="form-row">
	<div class="col-md-6">
	<label for="Surname:">Surname:</label>
	<input type="text" placehoder="" class="form-control" name="surname" value = "<?php echo $data['surname']?>">
</div>
<div class="col-md-6">
	<label for="First Name">First Name :</label>
	<input type="text" placehoder="" class="form-control" name="first_name" value = "<?php echo $data['first_name']?>">
</div>

	<div class="col-md-6">
	<label for="Father's Name">Father's Name :</label>
	<input type="text" placehoder="" class="form-control" name="fathers_name" value = "<?php echo $data['fathers_name']?>">
</div>

	<div class="col-md-6">
	<label for="mother's Name">Mother's Name :</label>
	<input type="text" placehoder="" class="form-control" name="mothers_name" value = "<?php echo $data['mothers_name']?>">
</div>
</div>
 </fieldset>
 <fieldset class="scheduler-border">
    <legend class="scheduler-border"> Other Info </legend>
<div class="form-row">
	<div class="col-md-6">
	<label for="DOB">DOB :</label>
	<input type="text" placehoder="" class="form-control" name="dob" value = "<?php echo $data['dob']?>">
</div>
<div class="col-md-6">
	<label for="Religion">Religion :</label>
	<input type="text" placehoder="" class="form-control" name="religion" value = "<?php echo $data['religion']?>">
</div>
</div>

<div class="form-row">
	<div class="col-md-6">
	<label for="Caste">Caste :</label>
	<input type="text" placehoder="" class="form-control" name="caste" value = "<?php echo $data['caste']?>">
	</div>
	<div class="col-md-6">
	<label for="Category">Category :</label>
	<input type="text" placehoder="" class="form-control" name="category" value = "<?php echo $data['category']?>">
	</div>
</div>	
<div class="form-row">
	<div class="col-md-6">
	<label for="Blood Group">Blood Group :</label>
	<input type="text" placehoder="" class="form-control" name="blood_group" value = "<?php echo $data['blood_group']?>"
>
	</div>
	<div class="col-md-6">
		<label for="Adhar Card No">Adhar Card No. :</label>
	<input type="text" placehoder="" class="form-control" name="adharcard_no" value = "<?php echo $data['adharcard_no']?>">
	
	</div>
</div>
</fieldset>
<fieldset class="scheduler-border">
    <legend class="scheduler-border"> Contact Info </legend>
<div class="form-row">
	<div class="col-md-6">
	<label for="Contact No.">Contact No.(SMS) :</label>
	<input type="text" placehoder="" class="form-control" name="sms_contact_no" value = "<?php echo $data['sms_contact_no']?>">
    </div>
	<div class="col-md-6">
	<label for="Contact No.">Contact No.(Optional) :</label>
	<input type="text" placehoder="" class="form-control" name="gen_contact_no" value = "<?php echo $data['gen_contact_no']?>">
	</div>
</div>
<div class="form-row">
	<label for="Address">Address :</label>
	<textarea type="text" placehoder="" class="form-control" name="address" ><?php echo $data['address']?></textarea >
</div>
</fieldset>
		<input type="hidden" name="q" value="ups" >
		<input type="hidden" name="id" value="<?php echo $id; ?>" >
		<br>
          <input type="submit" name="sub" id="submit" class="btn btn-primary btn-block" href="login.html"
          value="Update">
          
</form>
<!--
  <div class="form-row">

                <la
                bel for="exampleInputName">UID</
                label>
           <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="uid" placeholder="UID">
              </div> -->