<?php
/**
*user file
*/

$value = "my cookie value2";

// send a cookie that expires in 24 hours
//setcookie("TestCookie", $value, time()+3600*24, '/yogendra1/');
echo $_COOKIE['TestCookie']; exit;
$user_name = $_POST['username'];
echo "hello this is one";
//echo json_encode(array('returned_val' => 'yoho'));
exit;
if ($user_name == 'yogi') {
 return "success";
} else {
 return "failure";
}
?>