<?php

class A {
public function __construct() {
 echo 'main cons';
}

public function __construct($name, $age) {
 echo 'parameterized cons...';
}

}

$a = new A();

