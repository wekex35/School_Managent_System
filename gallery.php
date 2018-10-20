<?php
/*echo "hello\t hiii \timages/icon.png * hello\t hiii \t images/icon.png* hello\t hiii \t images/icon.png* hello\t hiii \t images/icon.png* hello\t hiii \t images/icon.png* hello\t hiii \timages/icon.png"
*/
?>
 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Add Images
      </div>
      <div class="card-body">


 <form id="application" action="upload.php" method="post">
 	<input type="hidden" name="w" value="g">
<div id="uploadFormLayer">
<label>Select Files:</label><br/>

<input name="image[]" type="file" class="form-control" class="inputFile" multiple="multiple" />
<br>
<input type="submit" value="Submit" class="btn btn-primary btn-block" id="btnSubmit" />

</form>
</div>
</div>
	
</div>

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Add Images
      </div>
      <div class="card-body">
<?php 
$_POST['q'] = "gadis";
include_once 'retreive.php';
?>
</div>
</div>
	
</div>


</div>

<br>