<?php
session_start();
include_once 'database_info.php';
//$_SESSION['type']="hello";
$ret = @$_SESSION['login'];
  $type =  $ret['type'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Panel</title>
  <link rel="shortcut icon" href="images/icon.ico">
  <!-- Bootstrap core CSS-->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
   <link href="assets/vendor/datatables/datatables.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/buttons.dataTables.min.css">
  <style type="text/css">
    sup {
  font-size: xx-small;
  vertical-align: top;
}
  </style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
<?php
if (isset($_SESSION['login'])) {
  
?>

  <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><img src="images/icon.ico" width="30" height="30">&nbsp;School Management System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="active nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php?p=hm">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="View Informations">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-info-circle"></i>
            <span class="nav-link-text">View Informations</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2">
             <li>
              <a href="index.php?p=vi&s=Students"><i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Students</span></a>
            </li>
             <li>
              <a href="index.php?p=vi&s=Teachers"> <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Teachers</span></a>
            </li>
           
            <li>
              <a href="index.php?p=vi&s=Drivers"><i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Drivers</span></a>
            </li>
              <li>
              <a href="index.php?p=vi&s=Class"><i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Class</span></a>
            </li>
          </ul>
        </li>
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Attendence">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#attendence" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Attendence</span>
          </a>
          <ul class="sidenav-second-level collapse" id="attendence">
            <li>
              <a href="index.php?p=ta"> <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Take Attendence</span></a>
            </li>
            <li>
              <a href="index.php?p=va"><i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">View Attendence</span></a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Students">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-graduation-cap"></i>
            <span class="nav-link-text">Add Students</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="index.php?p=ia"> <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Individual Admit</span></a>
            </li>
            <li>
              <a href="index.php?p=ba"><i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Bulk Admit</span></a>
            </li>
          </ul>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Send Message">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Send Message</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages1">
            <li>
              <a href="index.php?p=sp&s=Students">Parents</a>
            </li>
            <li>
              <a href="index.php?p=sd&s=Drivers">Drivers</a>
            </li>
          </ul>
        </li>



        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Inforamtion">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user-plus"></i>
            <span class="nav-link-text">Add Inforamtion</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
           
            <li>
              <a href="index.php?p=at">Add Teachers</a>
            </li>
             <li>
              <a href="index.php?p=ac">Add Class</a>
            </li>
            <li>
              <a href="index.php?p=ad">Add Drivers</a>
            </li>
           
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="For App">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#app" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-android"></i>
            <span class="nav-link-text">Application</span>
          </a>
          <ul class="sidenav-second-level collapse" id="app">
           
            <li>
              <a href="index.php?p=ga">Gallery</a>
            </li>
             <li>
              <a href="index.php?p=sprt">Sports</a>
            </li>
           
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="userInfo" href="ti_<?php  echo $ret['id'];?>" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text"><?php echo $ret['name']; ?>
            </span>
          </a>
         
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
 
    
  
  <div class="content-wrapper">
     <div class="text-center coverlay position-fixed" id="formResponse" ></div>
    <div class="container-fluid">
     
      

     
      <?php
        switch (@$_GET['p']) {
          
          case 'vi':$title = @$_GET['s'];include 'view_information.php';
            break;
          case 'ia': include 'add_students.php'; 
            break;
          case 'sp': $title = "Parents SMS List"; include 'send_parents.php';
            break;
          case 'sd': $title = "Drivers SMS List"; include 'send_driver.php';
            break;
          case 'at': include 'add_teacher.php'; 
            break;
          case 'ac': include 'add_class.php'; 
            break;
          case 'ad': include 'add_drivers.php'; 
            break;
          case 'ba': include 'bulk_admit.php'; 
            break;
          case 'va': include 'view_attendence.php';
            break;
          case 'ta': include 'attendence_management.php';//take_attendence.php'; 
            break;
          case 'ga': include 'gallery.php';//gallary'; 
            break;
          case 'sprt': include 'sports.php';//sports'; 
            break;

          
          default:
            include 'home.php'; break;
        }
      ?>
       
    </div>
  </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © School Management System 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->

<?php include_once 'modals.php'; }
else{
include 'login.html';
}
 ?>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/vendor/datatables/datatables.js"></script>
     <script src="assets/vendor/datatables/datatables.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="assets/js/sb-admin-datatables.min.js"></script>
    <script src="assets/js/sb-admin-charts.min.js"></script>
    <script src="assets/js/custom1.js"></script>
    <script src="assets/js/attend.js"></script>


<script type="text/javascript">   
  $(document).ready(function(){
$("#logoutit").click(function(e) {

var url = "logout.php";
    $.ajax({
      type : "POST",
      url : url,
      success :function(data){
        alert(data);
    if (data.includes("Successful")) {
        window.location.replace("index.php");
      }else{
        $(".progress").hide(true);
        $("#response").fadeIn(true);
       $("#response").addClass("alert alert-danger");
        $("#response").html(data);
      }
    }

    });
  e.preventDefault();
});
      
 $("#login").click(function(e) {
  $(".progress").show(true);
  $("#response").fadeOut(true);
  var p_current = 0;
  var interval = setInterval(function() {
    p_current += 10;
    $("#dynamic")
    .css("width",p_current+"%")
    .attr("aria-volume",p_current)
    .text(p_current);
    if (p_current >= 100) {
      clearInterval(interval);
      }
    },10);
    var url = "insert.php";
    $.ajax({
      type : "POST",
      url : url,
      data : $("#form").serialize(),
      success :function(data){
      
    if (data == "Successful") {
        window.location.replace("index.php");
      }else{
        $(".progress").hide(true);
        $("#response").fadeIn(true);
       $("#response").addClass("alert alert-danger");
        $("#response").html(data);
      }
    }

    });
    e.preventDefault();
  });
 });
    </script>
</body>

</html>


