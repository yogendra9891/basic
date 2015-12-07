<?php
// The file
$filename = 'y.jpg';

// Set a maximum height and width
$width = 200;
$height = 200;

// Content type
header('Content-Type: image/jpeg');

// Get new dimensions
list($width_orig, $height_orig) = getimagesize($filename);

/*
$ratio_orig = $width_orig/$height_orig;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
} */

//$image_p = 'e.jpg';
// Resample
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
 //$image($image_p, '', 100);
// Output
imagejpeg($image_p, 'yogi.jpg', 80); //80 is quality(maximumm is 100)
echo "done"; 
?>