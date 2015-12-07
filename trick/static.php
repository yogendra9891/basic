<?php
class A {
public static $name = 'yogi';
public $add = 'as';
public static function myTest() {
	//$this->name = 'ssa'; //Fatal error: Using $this when not in object context 
	return A::$name = 'static variable from static method';
	//return A::$add; //Fatal error: Access to undeclared static property: A::$add
}

public function test1() {
	return A::$name = 'static variable from non static method.';
}
}
$a = new A();
//echo $a->myTest(); //Strict Standards: Accessing static property A::$name as non static
echo A::myTest();
echo "<br>";
echo $a->test1();