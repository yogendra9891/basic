<?php
class Penguin {
 
  public function __construct($name) {
      $this->species = 'Penguin';
      $this->name = $name;
  }
 
  public function __toString() {
      return $this->name . " (" . $this->species . ")\n";
  }
}

$tux = new Penguin('tux');
echo $tux;