<?php

$a = array(3, 4, 1, 6);
$count = count($a);
for ($i =0; $i< $count; $i++) {

if ($a[$i] > $a[$i+1]) {
	$temp    = $a[$i];
	$a[$i]   = $a[$i+1];
	$a[$i+1] = $a[$i];
	$s = 1;
}
if (($i == $count) && ($s == 1)) {
	$i = 0;
	$s = 1;
}

}
print_r($a); exit;

?>