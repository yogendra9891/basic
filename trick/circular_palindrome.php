<?php
function checkPalindrome($string) {
	$len = strlen($string);
	$mid = ceil($len/2);
	$d = 1;
	for ($i=0; $i<$mid; $i++) {
		if ($string[$i] != $string[$len-($i+1)]) 
			return false;
	}
	return true;
}


function checkCircularpalindrome($string) {
	$l = strlen($string);
	$str3 = $string;
	for ($i=0; $i<$l;$i++) {
		$str1 = substr($str3, $i+1, $l-$i-1);
		$str2 = substr($str3, 0, $i+1);
		$str = $str1.$str2;
		if(checkPalindrome($str)) {
			return true;
		}
	}
	return false;
}

$check = checkCircularpalindrome('aaaad');
if ($check) 
	echo "is a circular palidrome";
else 
	echo "is not a circular palidrome";