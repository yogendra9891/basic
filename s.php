<?php
function foo($var)
{
$x = &$var;
$x += 1;
return $var;
}

$a=5;
$v = foo($a);
echo $v;