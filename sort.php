<?php

$d= array( "4", "6", "1" );
sort($d);
print_r($d); exit;
	function sortFunction($a,$b)
	{
		if ($a[1] == $b[1]) return 0;
		return ($a[1] > $b[1]) ? 1 : -1;
	}
?>