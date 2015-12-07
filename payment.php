<?php

$p1 = 100;
$p2 = 50;
$p3 = 30;
$p4 = 20;

$y1 = 0;
$y2 = 0;

$price = 60;

if ($price > $p1) { // when price is greater than 100
	$y1 = $price % $p1;
	echo "100 gift card = ". $g1 = floor($price/$p1)."<br>"; 
} 
//in every case $y1 will be less than $p1
if ($price > $p2 && $y1 > 0) { // when price is greater than 50
	$y2 = $y1 % $p2;
	echo "50 gift card = ". $g2 = floor($y1/$p2)."<br>"; 
} else if ($price > $p2) { // when price is low than 50
	$y2 = $price % $p2;
	echo "50 gift card = ". $g2 = floor($price/$p2)."<br>"; 
}
echo "remaining amount = ". $y2;
if ($price > $p3 && $y2 > 0) { //when price is greater than 30 and amount remaining for using gift card
    
}

if ($price > $p3) { //when price is greater than 30
    
}

