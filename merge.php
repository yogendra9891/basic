<?php

$a = array(2,3, 1, 3);
$b = array('a'=>6,'b'=>7, 'c'=>9);
$c = array(2,3, 1, 3);

$d = array_merge($c, $b, $a);
echo "<pre>";
print_r($d);