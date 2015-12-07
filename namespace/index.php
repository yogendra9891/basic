<?php
use \test;
use \test_second;
include('test.php');
$someObject = new test\SomeObject('namspace_one');
echo $someObject->getVariable();

echo "<br/>";
$someObject = new test_second\SomeObject('namspace_second');
echo $someObject->getVariable();
?>