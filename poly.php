<?php
/**
* defining  the interface
*/
interface IAnimal
{
  const CAN_FLY_MSG     = "I'm flying high";
  const CAN_NOT_FLY_MSG = "I can't fly";
  public function tryToFly();
  public function talk();
}

/**
* define the abstract class
*/
abstract class Animal implements IAnimal
{
	private $animalName;
	private $height;
	private $weight;
	private $favFood;
	private $speed;
	private $sound;
	private $canFly;
	
	public function __construct($animalName, $height, $weight, $favFood, $speed, $sound, $canFly)
	{
		$this->setanimalName($animalName);
		$this->setheight($height);
		$this->setweight($weight);
		$this->setsound($sound);
		$this->setspeed($speed);
		$this->setfavFood($favFood);
		$this->setcanFly($canFly);
	}
	
	public function tryToFly()
	{
		if ($this->getcanFly()) {
			echo self::CAN_FLY_MSG;
		} else {
			echo self::CAN_NOT_FLY_MSG;
		}
		
	}
	


	public function getanimalName()
	{
		return $this->animalName;
	}
	
	public function setanimalName($name)
	{
		$this->animalName = (string)$name; 
	}
	
	public function getheight()
	{
		return $this->height;
	}
	
	public function setheight($height)
	{
		if (!(is_numeric($height) && $height > 0)) {
		  throw new Exception('The Height must be greater than Zero');
		}
		$this->height = (double)$height;
	}
	
	public function getweight()
	{
		return $this->weight;
	}
	
	public function setweight($weight)
	{
		if (!(is_numeric($weight) && $weight > 0)) {
			throw new Exception('The Weight must be greater than Zero');
		}
		$this->weight = (double)$weight;
	}
	
	public function getfavFood()
	{
		return $this->favFood;
	}
	
	public function setfavFood($favFood)
	{
		$this->favFood = (string)$favFood;
	}
	
	public function getsound()
	{
		return $this->sound;
	}
	
	public function setsound($sound)
	{
		$this->sound = (string)$sound;
	}
	
	public function getspeed()
	{
		return $this->speed;
	}
	
	public function setspeed($speed)
	{
		$this->speed = (double)$speed;
	}
	
	public function getcanFly()
	{
		return $this->canFly;
	}
	
	public function setcanFly($canFly)
	{
		$this->canFly = (boolean)$canFly;
	}
	
	public function talk()
	{
	  echo $this->getsound();
	}
	
}


Class PlayWithAnimal 
{

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
			echo $animal->getanimalName().' '. $animal->dig();
			
		}
	}
   
	public function sayHello($animal)
	{
		echo "Hello ". $animal->getanimalName();
	}
}


class Dog extends Animal
{
	
	public function __construct($name, $height, $weight, $favFood, $speed, $sound, $canFly)
	{
		parent::__construct($name, $height, $weight, $favFood, $speed, $sound, $canFly);
		
	}
 
	public function dig()
	{
		echo "Dug a hole ";
	}

}

class Cat extends Animal
{

	public function __construct($name, $height, $weight, $favFood, $speed, $sound, $canFly)
	{
		parent::__construct($name, $height, $weight, $favFood, $speed, $sound, $canFly);
	}

}

class Bird extends Animal
{

	public function __construct($name, $height, $weight, $favFood, $speed, $sound, $canFly)
	{
		parent::__construct($name, $height, $weight, $favFood, $speed, $sound, $canFly);
	}

}

try {
$dog = new Dog('dog', 3, 4, 'cat', 5, 'Bark', false);
$playwithanimal = new PlayWithAnimal($dog);
echo "<br>";
$dog->tryToFly();
echo "<br>";
$dog->talk();



echo "<br>";
$cat = new Cat('cat', 3, 4, 'mice', 5, 'miow', false);
$playwithanimal = new PlayWithAnimal($cat);
echo "<br>";
$cat->tryToFly();
echo "<br>";
$cat->talk();

echo "<br>";
$bird = new Bird('Bird', 3, 4, 'insect', 5, 'miow', true);
$playwithanimal = new PlayWithAnimal($bird);
echo "<br>";
$bird->tryToFly();
echo "<br>";
$bird->talk();
} catch(Exception $e) {
	echo $e->getMessage();
}
