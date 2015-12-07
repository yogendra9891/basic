<?php
interface template1
{
	public function f11();
}

abstract class parentTest
{

	abstract protected function f3($a);
	public function f1()
	{
		return "test";
	}
}

class childTest extends parentTest implements template1
{
	public function f2()
	{
	 //body of your function
	}
	public function f3($s)
	{
	 //body of your function
	}
}
$a = new childTest();
echo $a->f1();
?>