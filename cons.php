<?php
class ABC {

 public function __construct() {
  echo "inside construct";
 }
 
 public function __destruct() {
  echo "inside destruct";
 }

 public function xyz() {
  echo "inside xyz"; 
 }
 
 public function s() {
  echo "inside s";
 }

}

$a = new ABC();

$a->xyz();
$a->s();
