<?php
 $date = date('d');
 $month = date('m');
 $year = date('Y');
$range = explode("_", $ret['assigned_class']);
             $p0 = $range['0']; 
             $p1 = $range['1']; 
           // $query = "SELECT * FROM `student_info` WHERE `std` = '$p0' AND `div` = '$p1' ";
?>
<form action="" method="post" id="atten_form">
<div class="form-row">
<div class="col-sm-3">
	<label for="date">Date</label>
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
                    <div class="col-sm-3">       
	               <label>Month</label>
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
               
       <div class="col-sm-3">         
	   <label>Year</label>
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
    <div class="col-md-6">
        <label>DIV</label>
    <select class="form-control" name="std">
        <option><?php echo $p0; ?></option>
    </select>
    </div>
    <div class="col-md-6">      
    <label>DIV</label>
     <select class="form-control" name="div">
        <option><?php echo $p1; ?></option>
    </select>
</div>
</div>
<input type="Submit" name="Submit" value="GET LIST" class="form-control btn btn-primary" />
</form>