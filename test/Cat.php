<?php
/**
 * Define the Cat class
 * @author yogendra
 */
class Cat extends Animal
{

	public function __construct($name, $height, $weight, $favFood, $speed, $sound, $canFly)
	{
		//calling parent class constructor
		parent::__construct($name, $height, $weight, $favFood, $speed, $sound, $canFly);
	}

}