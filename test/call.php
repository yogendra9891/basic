<?php
require_once('IAnimal.php');
require_once('Animal.php');
require_once('PlayWithAnimal.php');
require_once('Dog.php');
require_once('Cat.php');
require_once('Bird.php');

try {
	$dog = new Dog('Dog', 3, 4, 'cat', 5, 'Bark', false);
	$playwithanimal = new PlayWithAnimal($dog);
	echo "<br>";
	$dog->tryToFly();
	echo "<br>";
	$dog->talk();
	
	
	
	echo "<br>";
	$cat = new Cat('Cat', 3, 4, 'mice', 5, 'miao', false);
	$playwithanimal = new PlayWithAnimal($cat);
	echo "<br>";
	$cat->tryToFly();
	echo "<br>";
	$cat->talk();
	
	echo "<br>";
	$bird = new Bird('Bird', 3, 4, 'insects', 5, 'miao', true);
	$playwithanimal = new PlayWithAnimal($bird);
	echo "<br>";
	$bird->tryToFly();
	echo "<br>";
	$bird->talk();
} catch (Exception $e) {
	echo $e->getMessage();
}