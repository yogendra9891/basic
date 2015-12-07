<?php
class A {
 const T ='test';
 public function test()
 {  
	return self::T;
 }   
}
 $f = new A();
 echo $f->test();
?>