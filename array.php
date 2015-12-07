<?php 
$x = [9, 2, 8,5, 6, 7,1,3, 1];
$y = count($x);

for($i=0; $i<$y-1; $i++)  
{
if($x[$i] > $x[$i+1])  
{
 $temp = $x[$i];
 $x[$i] = $x[$i+1];
 $x[$i+1] = $temp; // swap values
 $again = true;
}
if($i==$y-2 && $again==true) {
 $i = -1;
 $again = false;
 }
}
echo "<pre>";
print_r($x);
