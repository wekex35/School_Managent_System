  <?php 
         include_once 'std_div.php';
         ?>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Add Students
        
      </div>
      <div class="card-body">
        <form id="form" name="contact" action="">
        

   
<fieldset class="scheduler-border">
    <legend class="scheduler-border"> Basic Info </legend>
<div class="form-row">
<div class="col-md-6">
	<label for="Gr No">Gr No :</label>
	<input type="text" placehoder="" class="form-control" name="gr_no">
   </div>
   <div class="col-md-6">
	<label for="House">House :</label>
	<input type="text" placehoder="" class="form-control" name="house">
</div>
<div class="col-md-6">
	<label for="Roll no.">Roll no.:</label>
	<input type="text" placehoder="" class="form-control" name="roll_no">
</div>
<div class="col-md-6">
	<label for="School UID">School UID :</label>
	<input type="text" placehoder="" class="form-control" name="school_uid">
</div>

<div class="col-md-6">
	<label>STD</label>
            <?php echo $std; ?>
	
</div>
<div class="col-md-6">
	 <label>DIV</label>
            <?php echo $select_div; ?>
</div>
</div>
</fieldset>

<fieldset class="scheduler-border">
    <legend class="scheduler-border"> Personal Info </legend>
<div class="form-row">
	<div class="col-md-6">
	<label for="Surname:">Surname:</label>
	<input type="text" placehoder="" class="form-control" name="surname">
</div>
<div class="col-md-6">
	<label for="First Name">First Name :</label>
	<input type="text" placehoder="" class="form-control" name="first_name">
</div>

	<div class="col-md-6">
	<label for="Father's Name">Father's Name :</label>
	<input type="text" placehoder="" class="form-control" name="fathers_name">
</div>

	<div class="col-md-6">
	<label for="mother's Name">Mother's Name :</label>
	<input type="text" placehoder="" class="form-control" name="mothers_name">
</div>
</div>
 </fieldset>
 <fieldset class="scheduler-border">
    <legend class="scheduler-border"> Other Info </legend>
<div class="form-row">
	<div class="col-md-6">
	<label for="DOB">DOB :</label>
	<input type="text" placehoder="" class="form-control" name="dob">
</div>
<div class="col-md-6">
	<label for="Religion">Religion :</label>
	<input type="text" placehoder="" class="form-control" name="religion">
</div>
</div>

<div class="form-row">
	<div class="col-md-6">
	<label for="Caste">Caste :</label>
	<input type="text" placehoder="" class="form-control" name="caste">
	</div>
	<div class="col-md-6">
	<label for="Category">Category :</label>
	<input type="text" placehoder="" class="form-control" name="category">
	</div>
</div>	
<div class="form-row">
	<div class="col-md-6">
	<label for="Blood Group">Blood Group :</label>
	<input type="text" placehoder="" class="form-control" name="blood_group">
	</div>
	<div class="col-md-6">
		<label for="Adhar Card No">Adhar Card No. :</label>
	<input type="text" placehoder="" class="form-control" name="adharcard_no">
	
	</div>
</div>
</fieldset>
<fieldset class="scheduler-border">
    <legend class="scheduler-border"> Contact Info </legend>
<div class="form-row">
	<div class="col-md-6">
	<label for="Contact No.">Contact No.(SMS) :</label>
	<input type="text" placehoder="" class="form-control" name="sms_contact_no">
    </div>
	<div class="col-md-6">
	<label for="Contact No.">Contact No.(Optional) :</label>
	<input type="text" placehoder="" class="form-control" name="gen_contact_no">
	</div>
</div>
<div class="form-row">
	<label for="Address">Address :</label>
	<textarea type="text" placehoder="" class="form-control" name="address"></textarea>
</div>
</fieldset>
		<input type="hidden" name="q" value="s">
		<br>
          <input type="submit" name="sub" id="submit" class="btn btn-primary btn-block" href="login.html"
          value="Add">
</form>
</div>
</div>
</div>
<br>
<!--
  <div class="form-row">

                <la
                bel for="exampleInputName">UID</
                label>
           <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="uid" placeholder="UID">
              </div> -->