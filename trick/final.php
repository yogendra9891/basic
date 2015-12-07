<?php
final class A {
 //final public $name = 'ss'; //Fatal error: Cannot declare property A::$name final, the final modifier is allowed only for methods and classes
 
 public function test() {
 	///$this->name = 'overrided name';
	return 'dd';
 }
}

$a = new A();
echo $a->test();