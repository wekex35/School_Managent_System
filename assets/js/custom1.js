
  var nameNoArray = [];
  var mobileNoArray = [];
  $("tbody").on("click",".mob-no",function(event){ //Select To send SMS
     var selectedNo = $(event.target).val();
     var selectedName = $(event.target).attr("name");
     var index = $.inArray(selectedNo, mobileNoArray); 
     var index = $.inArray(selectedName, nameNoArray); 
    if (index != -1) {// means found so pop it 
        mobileNoArray.splice(index, 1);
       nameNoArray.splice(index, 1);
    } else {
        mobileNoArray.push(selectedNo);
        nameNoArray.push(selectedName);
    }
    console.log(mobileNoArray);
    //$(".val").html(","+mobileNoArray);
    if (nameNoArray=="") {
     $("#send").addClass("disabled");
    }else
    $("#send").removeClass("disabled");

     $(".name").html("<span>"+nameNoArray+"</span>");
   
  });



  $("#send").click(function(event){//Send SMS
     event.preventDefault();
    if (mobileNoArray!="") {
    
    $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    var msg = $("#message").val();
    var title = $("#title").val();
    var url = "send_sms.php";
    
    $.ajax({
      type : "POST",
      url : url,
        data : {q:mobileNoArray,m:msg,t:title},
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        $("#error-body").html(data);
        $("#error").modal('show');
      }

    });
    }
      
  });


$(".table").on("click", "a", function(e){//Clcik Button view information for Details Info
  e.preventDefault();
    var a_value = $(this).attr('href');
      var id_q = a_value.split("_");
       $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    var url = "retreive.php";
    $.ajax({
      type : "POST",
      url : url,
      data : {q:id_q[0],id:id_q[1]},
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        if(data =="Deleted ") {
        $("#formResponse").html(data);
        $("#formResponse").fadeIn(data);
        $("#formResponse").addClass("alert alert-danger");
        $("#"+id_q[1]).fadeOut();
        setTimeout(function() {
          $("#formResponse").fadeOut();
        //  $("#overlay").modal('hide');
        },2000);
      }else{        
        $(".modal-body").html(data);
        $("#viewInfo").modal('show');
      }

      },error: function(argument) {
       alert(argument);
      }

    });
});
    
 /* $('table.table a.').click(function(e) {
     e.preventDefault();
      var a_value = $(this).attr('href');
      var id_q = a_value.split("_");
       $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    var url = "retreive.php";
    $.ajax({
      type : "POST",
      url : url,
      data : {q:id_q[0],id:id_q[1]},
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        if(data =="Deleted ") {
        $("#formResponse").html(data);
        $("#formResponse").fadeIn(data);
        $("#formResponse").addClass("alert alert-danger");
        $("#"+id_q[1]).fadeOut();
        setTimeout(function() {
          $("#formResponse").fadeOut();
        //  $("#overlay").modal('hide');
        },2000);
      }else{        
        $(".modal-body").html(data);
        $("#viewInfo").modal('show');
      }

      },error: function(argument) {
       alert(argument);
      }

    });
      
    });
*/
//onload attendence amnagement



$("#viewInfo").on("click", "#fu", function(e){//Call Updating Form
e.preventDefault(); 
var a_value = $("#getid2").attr("name");
      var id_q = a_value.split("_");
       $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    var url = "getUpdateForm.php";
    $.ajax({
      type : "POST",
      url : url,
      data : {q:id_q[0],id:id_q[1]},
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
      
        $(".modal-body").html(data);
        $("#updateModal").modal('show');
      
      },error: function(argument) {
       alert(argument);
      }

    });
});


$("#viewInfo").on("click", "#fd", function(e){//Delete Record
e.preventDefault();  
    var a_value = $("#getid").attr("name");
      var id_q = a_value.split("_");
       $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    var url = "retreive.php";
    $.ajax({
      type : "POST",
      url : url,
      data : {q:id_q[0],id:id_q[1]},
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        if(data =="Deleted ") {
        $("#formResponse").html(data);
        $("#formResponse").fadeIn(data);
        $("#formResponse").addClass("alert alert-danger");
        $("#"+id_q[1]).fadeOut();
        setTimeout(function() {
          $("#formResponse").fadeOut();
        //  $("#overlay").modal('hide');
        },2000);
      }else{        
        $("#error-body").html(data);
        $("#error").modal('show');
      }

      },error: function(argument) {
       alert(argument);
      }

    });
});

$("#updateModal").on('focusout','input',function(e) {
e.preventDefault();
  
});


$("#updateModal").on('click','#submit',function(e) {//Modal update  Form Submission
e.preventDefault();
$("#updateModal").modal('hide');
    $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
   //alert($("#updateModal #form").serialize());
    var url = "insert.php";
    $.ajax({
      type : "POST",
      url : url,
      data : $("#updateModal #form").serialize(),
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        if (data.includes("Updated")) {
        $("#formResponse").html(data);
        $("#formResponse").fadeIn(data);
        $("#formResponse").addClass("alert alert-success");
        setTimeout(function() {
          $("#formResponse").fadeOut();
        //  $("#overlay").modal('hide');
        },2000);
        $("#form")[0].reset();

      }else if(data.includes("Error")){
        //Error 
        //alert(data);
        $("#error-body").html(data);
        $("#error").modal('show');
      }
    }

    });
  });

 
$("#submit").click(function(e) {//Submit All Types of Form  
    $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    var url = "insert.php";
    $.ajax({
      type : "POST",
      url : url,
      data : $("#form").serialize(),
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        if (data =="Successful") {
        $("#formResponse").html(data);
        $("#formResponse").fadeIn(data);
        $("#formResponse").addClass("alert alert-success");
        setTimeout(function() {
          $("#formResponse").fadeOut();
        //  $("#overlay").modal('hide');
        },2000);
        $("#form")[0].reset();

      }else{
        alert(data);
      }
    }

    });
    e.preventDefault();
  });
 

  $("#uploadForm").on('submit',(function(e) {//Upload CSV to database
    e.preventDefault();
     $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    $.ajax({
      url: "csv.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      processData:false,
      success: function(data)
        {
          $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        if (data =="Successful") {
        $("#formResponse").html(data);
        $("#formResponse").fadeIn(data);
        $("#formResponse").addClass("alert alert-success");
         
        setTimeout(function() {
          $("#formResponse").fadeOut();
        //  $("#overlay").modal('hide');
        },2000);
        $("#form")[0].reset();

      }else{
        $("#error-body").html(data);
        $("#error").modal('show');
      }
        },
        error: function() 
        {
        }           
     });
  }));


//Get Select Form
$("#select_date").click(function(e) {
  e.preventDefault();
  $("#attendSelect").modal('show');
});


$("#attendSelect").on('click','#submit',function(e) {//Modal Form Attendence Select
e.preventDefault();
    $("#updateModal").modal('hide');
    $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
   alert($("#updateModal #form").serialize());
    var url = "insert.php";
    $.ajax({
      type : "POST",
      url : url,
      data : $("#updateModal #form").serialize(),
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        if (data =="Successful") {
        $("#formResponse").html(data);
        $("#formResponse").fadeIn(data);
        $("#formResponse").addClass("alert alert-success");
        setTimeout(function() {
          $("#formResponse").fadeOut();
        //  $("#overlay").modal('hide');
        },2000);
        $("#form")[0].reset();

      }else{
        //Error 
        //alert(data);
        $("#error-body").html(data);
        $("#error").modal('show');
      }
    }

    });
  });
$("#error").on("click", "#email", function(e){//Call Updating Form
e.preventDefault(); 

    $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    var url = "send_email.php";
    var c_url = $(location).attr("href");
    var error =  $("#error #error-body").html();
   
    $.ajax({
      type : "POST",
      url : url,
      data : {url1:c_url,error1:error},
      success :function(data){
        
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        $("#error-body").html(data);
        $("#error").modal('show');
      
      },error: function(argument) {
       alert(argument);
      }

    });
});

$("#sendAll").click(function(event){//Send SMS to All
     event.preventDefault();
     var msg = $("#message").val();
    var title = $("#title").val();
    if (msg!="" && title!="") {
    
    $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    
    var url = "send_all_sms.php";
    
    $.ajax({
      type : "POST",
      url : url,
        data : {q:mobileNoArray,m:msg,t:title},
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        $("#error-body").html(data);
        $("#error").modal('show');
      }

    });
    }else
      alert("Please Enter Message and Title")
      
  });

$("#userInfo").click( function(e){//Clcik Button view information for Details Info
  e.preventDefault();

    var a_value = $(this).attr('href');
      var id_q = a_value.split("_");
       $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    var url = "retreive.php";
    $.ajax({
      type : "POST",
      url : url,
      data : {q:id_q[0],id:id_q[1]},
      success :function(data){
        $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        if(data =="Deleted ") {
        $("#formResponse").html(data);
        $("#formResponse").fadeIn(data);
        $("#formResponse").addClass("alert alert-danger");
        $("#"+id_q[1]).fadeOut();
        setTimeout(function() {
          $("#formResponse").fadeOut();
        //  $("#overlay").modal('hide');
        },2000);
      }else{        
        $(".modal-body").html(data);
        $("#viewInfo").modal('show');
      }

      },error: function(argument) {
       alert(argument);
      }

    });

  
});

  $("#expbutton").click(function(e){
      $(this).find('i').toggleClass('fa-toggle-up fa-toggle-down')
 });



 $("#application").on('submit',(function(e) {//Upload Application
    e.preventDefault();
    alert("hellooooo");
     $("#formResponse").addClass("c_spinner fa fa-circle-o-notch fa-spin");
    $.ajax({
      url: "uploadFiles.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      processData:false,
      success: function(data)
        {
          $("#formResponse").removeClass("c_spinner fa fa-circle-o-notch fa-spin");
        if (data =="Successful") {
        $("#formResponse").html(data);
        $("#formResponse").fadeIn(data);
        $("#formResponse").addClass("alert alert-success");
         
        setTimeout(function() {
          $("#formResponse").fadeOut();
        //  $("#overlay").modal('hide');
        },2000);
        $("#form")[0].reset();

      }else{
        $("#error-body").html(data);
        $("#error").modal('show');
      }
        },
        error: function() 
        {
        }           
     });
  }));
