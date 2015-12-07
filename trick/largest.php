<?php
$a = array(3, 4, 9,  2, 1, 7, 10);
$j = 0;
$l = count($a);
$max = $a[0];
for ($i = 0; $i < $l; $i++) {
 if ($max < $a[$i+1]) {
  $max = $a[$i+1];
 }
}
echo $max;
