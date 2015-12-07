
<?php
//Français
//Español
//echo utf8_decode('Español');
//die;
$string = '%7B%0A%20%20%22task%22%20:%20%22login%22,%0A%20%20%22taskData%22%20:%20%7B%0A%20%20%20%20%22mobile_username%22%20:%20%22%E2%82%AC%C2%A3%C2%A5%22,%0A%20%20%20%20%22mobile_password%22%20:%20%22shhdj%22%0A%20%20%7D%0A%7D';
$string='  { "task" : "login", "taskData" : { "mobile_username" : "€£¥", "mobile_password" : "shhdj" } }';
//$string = urldecode($string);
//echo $string;
//$f = preg_replace("/[\r\n]+/", " ", $s);
//$sd = utf8_encode($f);
//echo $sd;
$string = htmlentities($string, ENT_SUBSTITUTE, 'UTF-8');
//echo $string;
//$sd = utf8_decode($string);
/*$neu = str_replace('Espa�ol', 'esp', $sd);
$neu = str_replace('Fran�ais', 'fra', $neu);
$neu = preg_replace('#\%(..)\%(..)\%(..)#','&#x\1;&#x\2;&#x\3;',$neu);
$neu = preg_replace('#\%(..)\%(..)#','&#x\1;&#x\2;',$neu);
$neu = preg_replace('#\%(..)#','&#x\1;',$neu);*/

$data =  json_decode($string);
echo "<pre>";
print_r($data);
die('hello1');
?>
