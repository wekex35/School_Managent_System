  <ol class="breadcrumb">

        <li class="breadcrumb-item">
          <span>Information</span>
        </li>
        <li class="breadcrumb-item active"><?php echo $title; ?></li>

      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Message Panel <button class="btn btn-primary btn-sm button_right" id="sendAll">SEND ALL</button></div>

        <div class="card-body">
        
   				<div class="form-control"><span class="name" >Select From Information List</span><a class="pull-right" id="add" href="#dataTable" ><i class="fa fa-plus-square"></i></a></div>
<br>
 <input placeholder="Enter Title" class="form-control" name="title" id="title">
   		<textarea placeholder="Enter Message" class="form-control" name="message" id="message"></textarea>
        </div>
        <div class="card-footer"><button class="btn btn-primary btn-sm button_right disabled" id="send">SEND</button></div>
    </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Informations Table</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">          
                <?php
                $_POST['q'] = $_GET['s'];
              include_once 'retreive.php';

             ?>
             
            </table>

          </div>
        </div>
       
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      