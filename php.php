<?php
class ABC
{
 public function test()
 {
   echo "test1";
 }

 public function test($v)
 {
   echo $V;
 }
}
 $a = new ABC();
 $a->test();
 $a->test("TEST2");
?>