<?php
/*

* * * * * * *
* * * * *
* * *
*

*/
$n = 4;
for ($i=$n;$i>0;$i--) {
	for ($k=0; $k<(2*$i-1); $k++) {
			echo "* ";
	}
	echo "<br>";
}

echo "<br><br><br><br><br>";
for ($i=0;$i<$n;$i++) {
	for ($k=0; $k<(2*($n-$i)-1); $k++) {
			echo "* ";
	}
	echo "<br>";
}