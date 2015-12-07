<!DOCTYPE html>
<html>
<body>

<?php
$a1=array("a"=>"red","b"=>"green","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");

$result1=array_merge($a2,$a1);
print_r($result1);
?>

</body>
</html>