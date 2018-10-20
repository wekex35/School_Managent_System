
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Add Students
        
      </div>
      <div class="card-body">
        <form id="form" name="contact" action="">

         <div class="form-row">
             
                <label for="exampleInputName">Name</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="name" placeholder="Enter Name">
              </div>
          
              <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">STD</label>
             <SELECT class="form-control"  type="drop_down" name="std" >
              <option value="j">Jr.<sup>kg</sup></option>
              <option value="s">Sr.<sup>kg</sup></option>
              <option value="1">1<sup>st</sup></option>
              <option value="2">2<sup>nd</sup></option>
              <option value="3">3<sup>rd</sup></option>
              <?php 
              for ($i=4; $i < 13 ; $i++) { 
               ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?><sup>th</sup></option>
               <?php
              }
             
              ?>
            </SELECT> 
              </div>
              <div class="col-md-6">
                 <label for="exampleInputEmail1">DIV</label>
             <SELECT class="form-control"  type="drop_down" name="div" >
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
              <option>F</option>
              <option>G</option>
              <option>H</option>
            </SELECT> 
              </div>
            </div>
          </div>
           <div class="form-row">  
                <label for="exampleInputName">UID</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="uid" placeholder="UID">
              </div>
             <div class="form-row">  
                <label for="exampleInputName">Father's Name</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="father_name" placeholder="Enter Father's Name">
              </div>
            <div class="form-row">
             
                <label for="exampleInputName">Mother's Name</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" name="mother_name" placeholder="Enter Mother's Name">
              </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Student's Contact No.</label>
            <input class="form-control" id="exampleInputEmail1" type="contact_no" name="student_contact"
             aria-describedby="emailHelp" placeholder="Contact No.">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Parent's Contact No.</label>
            <input class="form-control" id="exampleInputEmail1" type="contact_no" name="parent_contact"
             aria-describedby="emailHelp" placeholder="Contact No.">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" 
            name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          
            

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
              </div>
            </div>
          </div>
          
          <input type="hidden" name="q" value="s">
          <input type="submit" name="sub" id="submit" class="btn btn-primary btn-block" href="login.html"
          value="Add">
        </form>
       
      </div>
    </div>
  </div>
  <?php
/*$name=$_POST['name'];

  $std = $_POST['std'];
  $div = $_POST['div'];

  $father_name=$_POST['father_name'];
  $mother_name=$_POST['mother_name'];

  $student_contact=$_POST['student_contact'];
  $parent_contact=$_POST['parent_contact'];

  $email = $_POST['email'];
  $password= $_POST['password'];

  $uid = $_POST['uid'];

  $query = "INSERT INTO `student_info`( `name`,`std`,`div`,`father_name`, `mother_name`, `student_contact`, `parent_contact`,`email`, `password`,`UID`) VALUES ('$name','$std','$div','$father_name','$mother_name','$student_contact','$parent_contact','$email','$password','$uid')";*/
  ?>