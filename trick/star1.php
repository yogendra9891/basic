<?php
/*

	*
  *	* *
* * * * *

*/
for ($i=0;$i<3;$i++) {
	for ($j=1; $j<3-$i; $j++) {
		echo "-";
	}
	for ($k=0; $k<(2*$i+1); $k++) {
			echo "*";
	}
	echo "<br>";
}