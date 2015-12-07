<?php

class AA {
public $a;
private $b;
protected $c;
public function test() {
	$this->c = 10;
	return $this->c;
}
}

$aa = new AA();
//$aa->c =10; //Fatal error: Cannot access protected property AA::$c
//$aa->b = 12; //Fatal error: Cannot access private property AA::$b
//echo $aa->c; //Fatal error: Cannot access protected property AA::$c

echo $aa->test();