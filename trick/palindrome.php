<?php
$string = "123454321";
echo "String is: ". $string."<br>";

$len = strlen($string);
$mid = ceil($len/2);
$d = 1;
for ($i=0; $i<$mid; $i++) {
	if ($string[$i] != $string[$len-($i+1)]) {
		$d = 0;
		break;
	}
}

if ($d) {
	echo "palindrome";
} else {
	echo "not palindrome";
}
exit;
?>