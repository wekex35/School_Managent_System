<?php
 $date = date('d');
 $month1 = date('m');
 $month = date('m',strtotime(" -1 month",time()));
 $year = date('Y');
  include_once 'std_div.php';
 /*$range = explode("_", $ret['assigned_class']);
             $p0 = $range['0']; 
             $p1 = $range['1']; */
           // $query = "SELECT * FROM `student_info` WHERE `std` = '$p0' AND `div` = '$p1' ";

?>

    <div class="card mx-auto mt-5">
      <div class="card-header">
        Select Date Range :
         <span class="pull-right" id="expbutton" data-toggle="collapse" href="#shownow" ><i class="fa fa-toggle-down"></i></span>
      </div>
      <div class="card-body" id="shownow">
         <form action="" method="post" id="dateform"  class="form">
    <div class="form-row">
      <div class="col-xm-2">
        <h6 class="form-control">From :</h6>
      </div>
  
        <div class="col-sm-2">
               <!-- <label for="date">Date</label> -->
                        <select name="date" class="form-control">
                            <?php for($i=1;$i<=31;$i++):
                                $i = str_pad($i,2,0,STR_PAD_LEFT); ?>
                                <option value="<?php echo $i;?>" 
                                    <?php if(isset($date) && $date==$i)echo 'selected="selected"';?>>
                                        <?php echo $i;?>
                                </option>
                            <?php endfor;?>
                        </select>
        </div>
        <div class="col-sm-2">       
              <!--  <label>Month</label> -->
                        <select name="month" class="form-control">
                            <?php 
                            for($i=1;$i<=12;$i++):
                                 $i = str_pad($i,2,0,STR_PAD_LEFT);
                                if($i==1)$m='january';
                                else if($i==2)$m='february';
                                else if($i==3)$m='march';
                                else if($i==4)$m='april';
                                else if($i==5)$m='may';
                                else if($i==6)$m='june';
                                else if($i==7)$m='july';
                                else if($i==8)$m='august';
                                else if($i==9)$m='september';
                                else if($i==10)$m='october';
                                else if($i==11)$m='november';
                                else if($i==12)$m='december';
                            ?>
                                <option value="<?php echo $i;?>"
                                    <?php if($month==$i)echo 'selected="selected"';?>>
                                        <?php echo $m;?>
                                            </option>
                            <?php 
                            endfor;
                            ?>
                        </select>
        </div>
               
       <div class="col-sm-2">         
              <!--   <label>Year</label> -->
                        <select name="year" class="form-control">
                            <?php for($i=2020;$i>=2010;$i--):?>
                                <option value="<?php echo $i;?>"
                                    <?php if(isset($year) && $year==$i)echo 'selected="selected"';?>>
                                        <?php echo $i;?>
                                            </option>
                            <?php endfor;?>
                        </select>
        </div>
      </div>  
        <div class="form-row">
          <div class="col-xm-2">
        <h6 class="form-control">To :</h6>
      </div>
        <div class="col-sm-2">

               <!-- <label for="date">Date</label> -->
                        <select name="date1" class="form-control">
                            <?php for($i=1;$i<=31;$i++):
                                $i = str_pad($i,2,0,STR_PAD_LEFT); ?>
                                <option value="<?php echo $i;?>" 
                                    <?php if(isset($date) && $date==$i)echo 'selected="selected"';?>>
                                        <?php echo $i;?>
                                </option>
                            <?php endfor;?>
                        </select>
        </div>
        <div class="col-sm-2">       
              <!--  <label>Month</label> -->
                        <select name="month1" class="form-control">
                            <?php 
                            for($i=1;$i<=12;$i++):
                                 $i = str_pad($i,2,0,STR_PAD_LEFT);
                                if($i==1)$m='january';
                                else if($i==2)$m='february';
                                else if($i==3)$m='march';
                                else if($i==4)$m='april';
                                else if($i==5)$m='may';
                                else if($i==6)$m='june';
                                else if($i==7)$m='july';
                                else if($i==8)$m='august';
                                else if($i==9)$m='september';
                                else if($i==10)$m='october';
                                else if($i==11)$m='november';
                                else if($i==12)$m='december';
                            ?>
                                <option value="<?php echo $i;?>"
                                    <?php if($month1==$i)echo 'selected="selected"';?>>
                                        <?php echo $m;?>
                                            </option>
                            <?php 
                            endfor;
                            ?>
                        </select>
        </div>
               
       <div class="col-sm-2">         
              <!--   <label>Year</label> -->
                        <select name="year1" class="form-control">
                            <?php for($i=2020;$i>=2010;$i--):?>
                                <option value="<?php echo $i;?>"
                                    <?php if(isset($year) && $year==$i)echo 'selected="selected"';?>>
                                        <?php echo $i;?>
                                            </option>
                            <?php endfor;?>
                        </select>
        </div>
      </div> 
       <div class="form-row">
        <div class="col-sm-2">
            <label>STD</label>
            <?php echo $std; ?>
        </div>
        <div class="col-sm-2">
            <label>DIV</label>
            <?php echo $select_div; ?>
        </div>
        <!--<div class="col-sm-2">
                <label>STD</label>
                        <select class="form-control" name="std">
                             <option><?php echo $p0; ?></option>
                        </select>
        </div>

        <div class="col-sm-2">      
                <label>DIV</label>
                            <select class="form-control" name="div">
                             <option><?php echo $p1; ?></option>
                    </select>
        </div>-->
      </div>
         <div class="form-row">
        <input type="hidden" name="q" value="<?php echo $_GET['p']; ?>">
        <div class="col-sm-2">
            <label></label>
            <input type="Submit" name="Submit" id="view_attendance" value="GET LIST" class="form-control btn btn-primary" />
        </div>
      </div>
  </form>
      
      </div>
    </div>
  
      <div class="card mx-auto mt-5">
      <div class="card-header">
        Attendance View :<a class="pull-right" id="addvi" href="#viewTable"><i class="fa fa-plus-square"> Export</i> </a>
      </div>
      <div class="card-body" id="viewData">
        <div class="table-responsive">
         <table class="table table-bordered" id="viewTable" width="100%" cellspacing="0">
           
         </table>
        
      </div>
    </div>

  </div>
