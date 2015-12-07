<?php
trait HelloWorld {
	public function sayHello() {
		echo "say hello from trait";
	}
}

class Base {
	public function sayHello() {
		echo "say hello from base class";
	}
}

class Child extends Base {
	use HelloWorld;
	public function sayHello() {
		parent::sayHello();
		echo "say hello from child class";
	}
}

$c = new Child();
$c->sayHello();
