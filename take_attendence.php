<?php
 $date = date('d');
 $month = date('m');
 $year = date('Y');
$range = explode("_", $ret['assigned_class']);
             $p0 = $range['0']; 
             $p1 = $range['1']; 
           // $query = "SELECT * FROM `student_info` WHERE `std` = '$p0' AND `div` = '$p1' ";
?>
<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Informations Table
           <div >
            <span>Send SMS</span>
            <button class="btn btn-primary" id="sendNow">Now</button>
            <button class="btn btn-secondary" id="sendlater">Later</button>
          </div>
         </div>
        <div class="card-body">
          <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
        <tr><th>Roll No.</th><th>NAME</th><th>ACTION</th></tr>
            </thead>
            <tbody id="myt">

             </tbody> 
            </table>
          </div>
        </div>
</div>