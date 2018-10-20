<?php
if (session_status() == PHP_SESSION_NONE) {
 	session_start();
 } 
              
             
              ?>
            </SELECT> 
<?php
	$ret = $_SESSION['login'];
	$type =  $ret['type'];
	function select_assigned_std($p0){
		return "<select class='form-control' name='std'><option>$p0</option></select>";
   }
  function select_assigned_div($p1){
    return "<select class='form-control' name='div'><option>$p1</option></select>";
  }
	$select_std_h = "<SELECT class='form-control'  type='drop_down' name='std' >
              <option value='Jr'>Jr.<sup>kg</sup></option>
              <option value='sr'>Sr.<sup>kg</sup></option>
              <option value='1'>1<sup>st</sup></option>
              <option value='2'>2<sup>nd</sup></option>
              <option value='3'>3<sup>rd</sup></option>";
	$select_div = "<SELECT class='form-control'  type='drop_down' name='div' >
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
              <option>F</option>
              <option>G</option>
              <option>H</option>
            </SELECT>";
            $std = "";
	switch ($type) {
		case '0': $std .= "<select class='form-control'  type='drop_down' name='std'> 
			  <option value='Jr'>Jr.<sup>kg</sup></option>
              <option value='sr'>Sr.<sup>kg</sup></option></select>";
				
			break;
		case '1':
		case '2':
		case '3':
			$range = explode("_", $ret['range']);
			 $p0 = @$range['0']; 
			 $p1 = @$range['1'];
		$std .= "<SELECT class='form-control'  type='drop_down' name='std' >"; 
			for ($i=$p0; $i < $p1 ; $i++) { 
               $std .=  "<option value='$i'>$i<sup>th</sup></option>";
              }
            $std .= "</select>";
			
			break;
		case '4':
		     $range = explode("_", $ret['assigned_class']);
		     $p0 = @$range['0']; 
			   $p1 = @$range['1']; 
			$std  = select_assigned_std($p0);
      $select_div = select_assigned_div($p1);
			break;

		default:
		$std .= $select_std_h;

		for ($i=4; $i < 13 ; $i++) { 
                 $std .=  "<option value='$i'>$i<sup>th</sup></option>";
              }
        $std .= "</select>";
		
			break;
	}


	?>
