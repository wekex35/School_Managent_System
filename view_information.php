  <script type="text/javascript">
$(document).ready(function() {
  $("#dataTables").dataTable({
    dom :'Bfrtip'
      Buttons:[
        'copy','csv','exel',
      ]
  });
  </script>
  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <span>Information</span>
        </li>
        <li class="breadcrumb-item active"><?php echo $title; ?></li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Informations Table</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

             <!-- <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </tfoot>-->
              
                
            
                <?php
                $_POST['q'] = $_GET['s'];
              include_once 'retreive.php';

             ?>
             
             
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>