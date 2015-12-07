<?php

$b = array('a'=>'1', 'b'=>'3', 'x'=>'61');
echo "<pre>".'Main Array.<br>';
print_r($b);
$c = serialize($b);
echo "<br><br>Serialize string".'<br><br>';
print_r($c);
echo "<br><br><br>";
echo "deserialize Array:";
echo "<pre>";
print_r(unserialize($c));