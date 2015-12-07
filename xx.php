<?php
$miss_param = '';
$json_decode_array =  array('a'=>1, 'b'=>2, 'c'=>3, 'd'=>0);
		
    	$chk_params = array('a', 'b', 'c', 'd');
    	//check for the parameteres existence and its values.
    	foreach ($chk_params as $param){
    		if (array_key_exists($param, $json_decode_array) && ($json_decode_array[$param] != '')) {
    			$check_error = 0;
    		} else {
    			$check_error = 1;
    			$miss_param = $param;
    			break;
    		}
    	}
echo $check_error;
echo "<br>";
echo $miss_param;
?>