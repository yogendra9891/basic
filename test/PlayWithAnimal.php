<?php
/**
 *Define the PlayWithClass
 */
Class PlayWithAnimal 
{

	/**
	 * Defining the construct of the class
	 * @param IAnimal $animal
	 */
	public function __construct(IAnimal $animal)
	{
		if ($animal instanceof Cat) {
			$this->sayHello($animal);
		}
		if ($animal instanceof Bird) {
			$this->sayHello($animal);
		}
		if ($animal instanceof Dog) {
			$this->sayHello($animal);
			echo "<br>";
			echo $animal->getanimalName().''. $animal->dig();
		}
	}
   
	/**
	 * function for saying hello to animal
	 * @param object $animal
	 * @return none
	 */
	public function sayHello($animal)
	{
		echo "Hello ". $animal->getanimalName();
	}
}