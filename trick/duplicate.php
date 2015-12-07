<?php
$a = array(2,3,4,1,2,4,6);
$b = array();
$l = count($a);

for ($i=0;$i<$l;$i++) {
	$flag = 0;
	$l1 = count($b);
	for($j=0;$j<$l1;$j++) {
		if($a[$i] == $b[$j]) {
			$flag = 1;
			break;
		}
	}
	if ($flag == 0) {
		$b[] = $a[$i]; 
	}
}
echo "<pre>";
print_r($b);
?>