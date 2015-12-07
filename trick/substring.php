<?php
$string = "abcab";
echo "String is: ". $string."<br>";
$check = array();
$len = strlen($string);
for ($i=0; $i<$len; $i++) {
$counter = 1;
$t = 1;
	for ($j=$i+1; $j<$len; $j++) {
	    
		foreach($check as $key=>$value) { //echo $i; echo "$j"; echo $key; exit;
			if ($key == $string[$j]) {
			    $counter = $counter+1;
				$t = 0;
				break;
			}
		}
		if (!$t)  { break;
		}
		if ($string[$i] == $string[$j]) {
			$counter++;
		}
	}
if ($t) {
$check[$string[$i]] = $counter;
}

//echo $check[$string[$i]];
}
print_r($check);
foreach($check as $key=>$value) {
 echo $key.'  '.$value."<br>";
}
exit;
?>