<?php
/**
 * Defining the Bird class
 * @author yogendra
 *
 */
class Bird extends Animal
{

	public function __construct($name, $height, $weight, $favFood, $speed, $sound, $canFly)
	{
		//calling parent class constructor
		parent::__construct($name, $height, $weight, $favFood, $speed, $sound, $canFly);
	}
	
	public function talk()
	{
	  echo $this->getsound();
	}
}