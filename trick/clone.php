<?php
//every thing in php is copied by reference
class A {
	public $t1;
	public function test() {
		$this->t1 = 10;
	}
}

$a = new A();
$a->test();

$c = $a;
$b = clone($a);

$a->t1 = 1;

echo $b->t1. '               ';

echo $c->t1;
