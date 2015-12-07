<?php
$test = false;
$min = array();
$min['time'] = array(23,3,322,55,556);
$max = array();
$max['time'] = array(22,32,4,56,557);
foreach($min['time'] as $key=>$val){
  if($val >= $max['time'][$key]){
    echo "big value<br>";
  }
}
?>