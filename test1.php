<?php

abstract class A {

private function  test(){ echo "sa";}

public function getname() {
	$this->test();
}
}
class B extends A {

}

$b = new B();
$b->getname();