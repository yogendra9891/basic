<?php
abstract class A {
	public function test() {
		echo "class A";
	}
}

class B extends A {
	public function test() {
		echo "class B";
	}
}

$b = new B();
$a = new B();

$x = $a;
if ($a === $x) {
	echo "equal objects";
}