
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
              <option value="J">Jr.<sup>kg</sup></option>
              <option value="S">Sr.<sup>kg</sup></option>
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

          <div class="form-group">
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
          
            <div class="form-group">
            <label for="exampleInputEmail1">Assigned Teacher (Optional)</label>
            <SELECT class="form-control"  type="drop_down" name="teacher_id" >
              <?php
                $result = $dbq -> query("SELECT `name`,`id` FROM `staff` WHERE `assigned_class` = '' AND `range`=''");
                while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
                    echo " <option value='$row[id]'>".$row['name']."</option>";
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