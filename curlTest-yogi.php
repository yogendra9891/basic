<?php

print_r($_POST);
function custom_tracking_callback() { 
    $name = $_REQUEST['name']; 
    $pid = $_REQUEST['pid']; 
    $date = time(); 
   
    $url = "http://www.google-analytics.com/collect"; 
 
    /** data to post to analytics **/ 
    $data = array( 
      'v'=>1, 
      'tid'=>'UA-56606864-1', 
      'cid'=>'1223', 
      't'=>'pageview',
	  'dimension1'=>'yogi',
	  'metric1'=>"12000"
    ); 
 
    $data['dimension1'] = $name;
    $data['metric1'] = "12000"; 
        $timeout = 5;
		 $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
            //TRUE to do a regular HTTP POST.
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            
            //TRUE to return the transfer as a string of the return value
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            // grab URL and pass it to the browser
            $data_response = curl_exec($ch);
			echo 'pradeep';
			echo $data_response;
			print_r( $data_response);exit;
}

custom_tracking_callback();