<?php
$str = 'stato=0&descrizione=&idcard=12530&nome=Cittadino&cognome=12530&email=yiresse.abia@gmail.com&cell=&userlogin=yiresse.abia@gmail.com&userpwd=2ac9cb7dc02b3c0083eb70898e549b63&idcardpadre=&abilitato=N';

parse_str($str, $e);
echo "<pre>";
print_r($e);