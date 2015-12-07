<?php
$a = 3;

class A {
 public function __construct() {
 
 }
 
 public function testA(B $b) {
  echo "You are testing the right thing..";
 }
}

class B {
 public function __construct() {

 }
}

class C extends B {
 public function __construct() {
 
 }
}

$d = new A();

$c = new C();

$d->testA($c);