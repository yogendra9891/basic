<?php
class Animal {
}
class Penguin extends Animal {
 
  public function __construct($id) {
    $this->getPenguinFromDb($id);
  }
 
  public function getPenguinFromDb($id) {
    // elegant and robust database code goes here
  }
 
  public function __get($field) {
    if($field == 'name') {
      return $this->username;
    }
  }
 
  public function __set($field, $value) {
    if($field == 'name') {
      $this->username = $value;
    }
  }
 
  public function __call($method, $args) {
      echo "unknown method " . $method;
	  echo "<pre>";
	  print_r($args);
      return false;
  }
}

$p = new Penguin(1);
$p->test(2, 3);

