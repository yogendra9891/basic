<!DOCTYPE html>
<html>
<body>
<?php
$d = "I love php, I love dfs/drgf /tgrty tyrtu ytjty";
$r =  strrpos($d, "/drgf");
echo substr($d, $r, strlen($d));
?>
</body>
</html>