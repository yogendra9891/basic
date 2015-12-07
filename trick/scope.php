<?php
Class A {
	public $a;
	protected $b;
	private $c;
	
	public function __construct() {
		$this->a = 1;
		$this->b = 2;
		$this->c = 3;
	}
	
	public function test () { //exit('ss');
	}
}

class B extends A {
	public function test () {
		echo $this->a;
	}
}

$aa = new B();
$aa->test();

//echo $aa->a = 10;

//echo $aa->b = 101;
//echo $aa->c = 101;