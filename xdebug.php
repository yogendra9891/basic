<?php

class MyTest {

public function checking() {
	$arr = array();
	for($i=0; $i<100000; $i++) {
		$arr[] = $i;
	}
	return $arr;
}
}

$my_test = new MyTest();
$my_test_result = $my_test->checking();
echo "<pre>";
print_r($my_test_result); exit;