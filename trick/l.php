<?php
$a = 2;
$b = 25;
$c = 15;

if ($a>$b && $a>$c) {
  echo 'a= '.$a;
} elseif ($b>$c) {
  echo 'b= '. $b;
} else {
  echo 'c= '.$c;
}
