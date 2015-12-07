<?php
  
 
    $data = array( 
      'v'=>1, 
      'tid'=>'UA-56606864-1', 
      'cid'=>'1223', 
      't'=>'pageview',
	  'dimension1'=>'yogi',
	  'metric1'=>"12000"
    ); 
	
  $postvars = '';
  foreach($fields as $key=>$value) {
    $postvars .= $key . "=" . $value . "&";
  } echo $postvars; 
  rtrim($postvars, '&');
  $url = "http://www.google-analytics.com/collect";
  
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, count($fields));
  curl_setopt($ch,CURLOPT_POSTFIELDS, $postvars);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
  
  $response = curl_exec($ch);
  print_r($response);
  curl_close ($ch);
?>
