<?php
$a = 5;
$sum=1;
for($i=1;$i<=$a;$i++) {
 $sum = ($sum*$i);	
}

echo $sum;
echo "<br>";
$sum = 1;


echo fact(5);

function fact($n) {
 if ($n == 1) 
	return 1;
 else 
	return  $n*fact($n-1);
}

