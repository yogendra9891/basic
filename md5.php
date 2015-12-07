<?php

$b = 'Password1';
$a = md5($b);

echo $a.'<br>';

$b = array("IDMOVIMENTO" => 190912, "IDCARD"=>2, "IDPDV"=>3, "DATA"=>"20141222120902", "IMPORTODIGITATO"=>4, "CREDITOSTORNATO" => 5, "RCUTI" => 6, "SHUTI" =>7 ,
        "PSUTI" => 8, "GCUTI" => 9, "GCRIM" => 10, "MOUTI"=>10 );
$c = (object)$b;

echo "<pre>";
print_r($c); exit;