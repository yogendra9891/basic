<?php
$check = file_get_contents('https://edit.yahoo.com/reg_json?PartnerName=yahoo_default&AccountID='.'abhishek_col50'.'@yahoo.com&ApiName=ValidateFields');
echo "<pre>";
print_r(json_decode($check)); 

?>