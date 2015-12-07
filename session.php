<?php
class Foo{
    public $var1;

    function __construct(){
        $this->var1 = "foo";
    }

    public function printFoo(){
        print $this->var1;
    }
	function changeFoo(&$foo) {
		$foo->var1 = "FOO";
	}
}


$foo = new Foo();

$foo->changeFoo($foo);

$foo->printFoo();


?>