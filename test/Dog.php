<?php
/**
 * Define the Dog class
 * @author yogendra
 *
 */
class Dog extends Animal
{
	
	public function __construct($name, $height, $weight, $favFood, $speed, $sound, $canFly)
	{
		//calling parent class constructor
		parent::__construct($name, $height, $weight, $favFood, $speed, $sound, $canFly);
		
	}
 
	/**
	 * Function for dog to digging
	 */
	public function dig()
	{
		echo "Dug a hole ";
	}

}