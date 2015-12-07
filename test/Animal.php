<?php
/**
 * define the abstract class
 * @author yogendra
 *
 */
abstract class Animal implements IAnimal
{
    //defining the property
	private $animalName;
	private $height;
	private $weight;
	private $favFood;
	private $speed;
	private $sound;
	private $canFly;
	
	/**
	*Initializing the properties.
	*/
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
	
	/**
	 * getting the fly property of animal 
	 * @see IAnimal::tryToFly()
	 */
	public function tryToFly()
	{
		if ($this->getcanFly()) {
			echo self::CAN_FLY_MSG;
		} else {
			echo self::CAN_NOT_FLY_MSG;
		}
		
	}

	/**
	 * getting the animal name
	 * @param none
	 * @return string
	 */
	public function getanimalName()
	{
		return $this->animalName;
	}
	
	/**
	 * set the animal name property
	 * @param unknown_type $name
	 * @return none
	 */
	public function setanimalName($name)
	{
		$this->animalName = (string)$name; 
	}
	
	/**
	 * getting the animal height
	 * @param none
	 * @return double
	 */
	public function getheight()
	{
		return $this->height;
	}
	
	/**
	 * set the animal height property
	 * @param double $height
	 * @throws Exception
	 */
	public function setheight($height)
	{
		if (!(is_numeric($height) && $height > 0)) {
		  throw new Exception('The Height must be greater than Zero');
		}
		$this->height = (double)$height;
	}
	
	/**
	 * getting the animal weight
	 * @param none
	 * @return double
	 */
	public function getweight()
	{
		return $this->weight;
	}

   /**
	* set the weight property of animal
	* @param double $weight
	* @return none
	*/
	public function setweight($weight)
	{
		if (!(is_numeric($weight) && $weight > 0)) {
			throw new Exception('The Weight must be greater than Zero');
		}
		$this->weight = (double)$weight;
	}
	
	/**
	 * getting the animal food
	 * @param none
	 * @return string
	 */
	public function getfavFood()
	{
		return $this->favFood;
	}
	
	/**
	 * set the food property of animal
	 * @param string $favFood
	 * @return none
	 */
	public function setfavFood($favFood)
	{
		$this->favFood = (string)$favFood;
	}
	
	/**
	 * getting the animal sound
	 * @param none
	 * @return double
	 */
	public function getsound()
	{
		return $this->sound;
	}

   /**
	* set the animal sound property
	* @param string $sound
	* @return none
	*/
	public function setsound($sound)
	{
		$this->sound = (string)$sound;
	}
	
   /**
	* getting the animal speed
	* @param none
	* @return double
	*/
	public function getspeed()
	{
		return $this->speed;
	}

	/**
	 * set the animal speed property
	 * @param double $speed
	 * @return none
	 */
	public function setspeed($speed)
	{
		$this->speed = (double)$speed;
	}
	
	/**
	 * getting the animal fly property
	 * @param none
	 * @return boolean
	 */
	public function getcanFly()
	{
		return $this->canFly;
	}
	
	/**
	 * set the animal flying property
	 * @param boolean $canFly
	 * @return none
	 */
	public function setcanFly($canFly)
	{
		$this->canFly = (boolean)$canFly;
	}
	
   /**
	* getting the animal sound
	* @param none
	* @return string
	*/
	public function talk()
	{
	  echo $this->getsound();
	}
}