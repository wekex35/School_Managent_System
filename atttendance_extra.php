
<button class="btr4n btn-primary" id="select_date" >SELECT</button>
<hr />
    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Month</th>
                <th>Year</th>
                <th>Class</th>
                <th>DIV</th>
                <th>send_msg</th>
                <th>Action</th>
           </tr>
       </thead>
        <tbody>
            <form method="post" action="" class="form" id="dateform">
                <tr class="gradeA">
                    <td>
                        <select id="date" name="date" class="form-control">
                            <?php for($i=1;$i<=31;$i++):?>
                                <option value="<?php echo $i;?>" 
                                    <?php if(isset($date) && $date==$i)echo 'selected="selected"';?>>
                                        <?php echo $i;?>
                                            </option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <td>
                        <select id="month" name="month" class="form-control">
                            <?php 
                            for($i=1;$i<=12;$i++):
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
                    </td>
                    <td>
                        <select id="year" name="year" class="form-control">
                            <?php for($i=2020;$i>=2010;$i--):?>
                                <option value="<?php echo $i;?>"
                                    <?php if(isset($year) && $year==$i)echo 'selected="selected"';?>>
                                        <?php echo $i;?>
                                            </option>
                            <?php endfor;?>
                        </select>
                    </td>
                    <td>
                    <select class="form-control" name="std">
                        <option><?php echo $p0; ?></option>
                    </select>
                    </td>
                    <td>
                    <select class="form-control" name="div">
                        <option><?php echo $p1; ?></option>
                    </select>
                    </td>
                    <td>
                        <select name="send_msg" class="form-control">
                           <option <?php if( isset($send_msg) &&$send_msg =='')echo 'selected="selected"';?>>Select</option>
                           <option <?php if(isset($send_msg) &&$send_msg =='Now')echo 'selected="selected"';?>>Now</option>
                           <option <?php if(isset($send_msg) &&$send_msg =='Later')echo 'selected="selected"';?>>Later</option>
                        </select>
                    </td>
                    <td align="center"><input type="submit"  value="manage_attendance" id="manage_attendance" class="btn btn-info"/></td>
                </tr>
                <input type="hidden" name="q" value="<?php echo $_GET['p']; ?>">
            </form>
        </tbody>
    </table>
