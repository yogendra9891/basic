<?php
$number = 11;

$mid = ceil($number/2);
$flag = 0;
for ($i=2;$i<=$mid;$i++) {
	if ($number%$i==0) {
		$flag = 1;
		break;
	}
}
if ($flag) {
 echo "not a prime"; 
} else {
 echo "is a prime";
}

