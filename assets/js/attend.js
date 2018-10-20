$(document).ready(function() {
	//var date = new Date().toDateInputValue();
$("#viewData").hide();
$("form select").change(function(e){
   $("#viewData").hide("slow");
});
$("#addvi").click(function(e) {
  $("#viewTable").DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'pageLength'
        ]
      });
});
//To update attendance 
$(".card").on("change","select[name=presenty]",function(e) { //To update attendance 
	e.preventDefault();
	 var ui = $(this).attr("ui");

	 var atid = $(this).attr("atid");
	 var data = "1="+$(this).val();
   var data_send = "a=aup&"+data+"&atid="+atid;
 if (ui == 'u') {
  $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
	var url = "attendence_mysql.php";
    $.ajax({
      type : "POST",
      url : url,
      data : data_send,
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        $("#error-body").html(data);
        $("#error").modal('show');
      },error: function(argument) {
       alert(argument);
      }

    });
	}

});



$(".card").on("click","#sendNow",function(e) {//To send Now
  e.preventDefault();
 var df = $("#dateform").serialize();
 data = "";
 var i  = 0;
 var ui = $('select[name=presenty]').attr("ui");
 $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
 $('select[name=presenty]').each(function(e){
 	data += i+"="+$(this).val()+"*"+$(this).attr("nameid")+"&send"+i+"="+$(this).attr("imp")+"&";
 	i++; 
 });

 //data to send *****
var data_send = "a=aias&no="+i+"&"+data+df+"&ui="+ui;

var url = "attendence_mysql.php";
    $.ajax({
      type : "POST",
      url : url,
      data : data_send,
      success :function(data){
         $("#viewData").hide("slow");
      $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        $("#error-body").html(data);
        $("#error").modal('show');
       
      },error: function(argument) {
       alert(argument);
      }

    });
    

});

$(".card").on("click","#sendlater",function(e) {
  e.preventDefault();
 var df = $("#dateform").serialize();
 data = "";
 var i  = 0;
 var ui = $('select[name=presenty]').attr("ui");
 $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
 
 if (ui == 'i') {

 $('select[name=presenty]').each(function(e){
 	data += i+"="+$(this).val()+"*"+$(this).attr("nameid")+"&";
 	i++; 
 });

 //data to send *****
var data_send = "a=ai&no="+i+"&"+data+df;
 // ********
 	var url = "attendence_mysql.php";
    $.ajax({
      type : "POST",
      url : url,
      data : data_send,
      success :function(data){
         $("#viewData").hide("slow");
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        $(location).reload();
        $("#error-body").html(data);
        $("#error").modal('show');
       // $("#dataTable").dataTable();
      },error: function(argument) {
       alert(argument);
      }

    });
    }else{
      $("#error-body").html("Done !");
        $("#error").modal('show');
      }
});

$("#select_date1").on("click",function(e) {
  e.preventDefault();
 load();
});

function load(){
	$('#dataTable').dataTable().fnDestroy();
	//alert($(".form").serialize());
 	var url = "retreive.php";
  $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    $.ajax({
      type : "POST",
      url : url,
      data : $(".form").serialize(),
      success :function(data){
  $("#viewData").show("slow");
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        $("#myt").html(data);
       // $("#dataTable").dataTable();
    
     $('#dataTable').dataTable({
     	"paging":false
     });
      },error: function(argument) {
       alert(argument);
      }

    });
}

//View Attendance 
$("#view_attendance").click(function(e) { 
	e.preventDefault();
	 var ui = $(this).attr("ui");
	 var atid = $(this).attr("atid");
	 var data = "1="+$(this).val();
    $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
	 var data_send = $(".form").serialize()+"&a=va&"+data+"&atid="+atid;
	  $("table").html("");
     // alert(data_send);
    //$("table").append("<tr><td>gh</td></tr>");
	var url = "attendence_mysql.php";
    $.ajax({
      type : "POST",
      url : url,
      data : data_send,
      success :function(data){
        $("#viewData").show("slow");
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
      var res = data.split("*");
      var no = res[0];
      //alert(no);
      $("table").append(res[1]);
      for (var i = 2; i < res.length; i++) {
      		 var td = res[i].split("#");
      		 for (var j = 0; j <= no; j++) {
      		 	if (td[j]!="") {
      		      $("#"+j).append(td[j]);
      		 }
      	}

    }
      
       // $("#dataTable").dataTable();
      },error: function(argument) {
    //   alert(argument);
      }

    });
	

});


});
