<?php
/*
      *
	* * *
  * * * * *
    * * * 
	  *

*/
$n = 6;
for ($i=0;$i<$n;$i++) {
	$row = ($i<3)? 3 : 6; 
	for ($j=0; $j<$row-$i-1; $j++) {
		echo "-";
	}
	for ($k=0; $k<(2*$i+1); $k++) {
			echo "*";
	}
	echo "<br>";
}