<!DOCTYPE html>
<html>
<body>

<?php
$number = range(2,11);
echo "<pre>";
print_r ($number);
echo "<br>";
print_r(array_search(12, $number)+1);

echo "<br>";
echo "<br>";
echo "District<br>";
$fix = 1111;
$n = 3336;
 
echo ceil($n/$fix);

echo "<br>Circle<br>";
$dis_position = ($n%$fix);

?>

</body>
</html>