<?php
/*echo "hello\t hiii \timages/icon.png * hello\t hiii \t images/icon.png* hello\t hiii \t images/icon.png* hello\t hiii \t images/icon.png* hello\t hiii \t images/icon.png* hello\t hiii \timages/icon.png"
*/
?>
 <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Sport News
      </div>
      <div class="card-body">


 <form id="application" action="upload.php" method="post">
<div id="uploadFormLayer">
<input type="hidden" name="w" value="s">
<label>Title :</label><br/>

<input name="title" type="text" class="form-control" class="inputFile" />
<label>Message :</label><br/>

<input name="msg" type="text" class="form-control" class="inputFile" />
<label>Upload File:</label><br/>

<input name="image" type="file" class="form-control" class="inputFile" />
<br>
<input type="submit" value="Submit" class="btn btn-primary btn-block" id="btnSubmit" />

</form>
</div>
</div>
	
</div>

<br>