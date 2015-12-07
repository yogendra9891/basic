<?php
echo "Fibonacci"."<br>";
$a = 0;
$b = 1;
echo $a.' '.$b.' ';
for ($i=0;$i<5;$i++) {
	$c = $a+$b;
	$a = $b;
	$b = $c;
	echo $c. ' ';
}
