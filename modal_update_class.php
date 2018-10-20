<?php 
$data = mysqli_fetch_array($dbq -> query("SELECT * FROM `class_manager` WHERE `id` = '$id'"));

 ?>

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
       Add Class

      </div>
      <div class="card-body">
        <form  id="form" name="contact" action="">
         
          <div class="form-group">
            <label for="exampleInputEmail1">STD</label>
             <SELECT class="form-control"  type="drop_down" name="std" >
              <option <?php if($data['std'] == "Jr")echo "selected='selected'" ?>  value="Jr">Jr.<sup>kg</sup></option>
              <option <?php if($data['std'] == "Sr")echo "selected='selected'" ?> value="Sr">Sr.<sup>kg</sup></option>
              <option <?php if($data['std'] == "1")echo "selected='selected'" ?> value="1">1<sup>st</sup></option>
              <option <?php if($data['std'] == "2")echo "selected='selected'" ?>value="2">2<sup>nd</sup></option>
              <option <?php if($data['std'] == "3")echo "selected='selected'" ?> value="3">3<sup>rd</sup></option>
              <?php 
              for ($i=4; $i < 13 ; $i++) { 
               ?>
                  <option   <?php if($data['std'] == $i)echo "selected='selected'" ?>value="<?php echo $i; ?>"><?php echo $i; ?><sup>th</sup></option>
               <?php
              }
             
              ?>
            </SELECT> 
           
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">DIV</label>
             <SELECT class="form-control"  type="drop_down" name="div" >
              <option <?php if($data['div'] == "A")echo "selected='selected'" ?>>A</option>
              <option <?php if($data['div'] == "B")echo "selected='selected'" ?>>B</option>
              <option <?php if($data['div'] == "C")echo "selected='selected'" ?>>C</option>
              <option <?php if($data['div'] == "D")echo "selected='selected'" ?>>D</option>
              <option <?php if($data['div'] == "E")echo "selected='selected'" ?>>E</option>
              <option <?php if($data['div'] == "F")echo "selected='selected'" ?>>F</option>
              <option <?php if($data['div'] == "G")echo "selected='selected'" ?>>G</option>
              <option <?php if($data['div'] == "H")echo "selected='selected'" ?>>H</option>
            </SELECT> 
          </div>
          
            <div class="form-group">
            <label for="exampleInputEmail1">Assigned Teacher (Optional)</label>
            <SELECT class="form-control"  type="drop_down" name="teacher_id" >
              <?php
                $result = $dbq -> query("SELECT `name` FROM `staff` WHERE `assigned_class` = ''");
                while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
  

                    echo " <option>".$row['name']."</option>";
                } ?>
            </SELECT> 
          </div>
        
          <input type="hidden" name="q" value="c">

          <input type="submit" name="sub" id="submit" class="btn btn-primary btn-block" 
          value="Add">
        </form>
       
      </div>
    </div>
  </div>


