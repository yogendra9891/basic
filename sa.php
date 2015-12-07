<?php
$a = "0012312";
$d = preg_replace('/0+/','',$a);
echo $d;
echo "<br>";

$iban_no = $d;
$iban2 = preg_replace('/^I?IBAN/', '', $iban_no);
//$iban2 = preg_replace('/^IBAN/', '', $iban1);
$iban3 = preg_replace('/[^a-zA-Z0-9]/', '', $iban2);
echo $iban3;
?>
