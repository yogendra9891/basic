<?php
class Test 
{
  public function test()
  {
   echo "coming here";
  }
}
$x = "Test";

$d = new $x;
$d->test();
?>