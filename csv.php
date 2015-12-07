<?php

$file = fopen("citizen_2014-11-24.csv", "r");
echo "<pre>";
while(! feof($file))
  {
  print_r(fgetcsv($file));
  }

fclose($file); 

/*
if ($fp = fopen('https://s3.amazonaws.com/sixthcontinent/uploads/users/exportprofile/citizen/citizen_2014-11-24.csv', 'r')) {
   $content = '';
   // keep reading until there's nothing left
   while ($line = fread($fp, 1024)) {
      $content .= $line;
   }
   }
   echo $content;
*/
   /*
$source = "https://s3.amazonaws.com/sixthcontinent/uploads/users/exportprofile/citizen/citizen_2014-11-24.csv";
$dest = 'c.csv';
copy($source, $dest); */
?>