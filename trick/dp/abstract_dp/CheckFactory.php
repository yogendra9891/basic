<?php
require "FactoryProducer.php";
class CheckFactory {
	public function getProducerFactory($string) {
		$factory = new FactoryProducer();
		return $factory->getFactory($string);
	}
}
$checkFactory = new CheckFactory();

//Shape Factory 
$shapeFactory = $checkFactory->getProducerFactory('Shape');
$circle = $shapeFactory->getShape('Circle');
$circle->draw();

echo "<br>";

$rectangle = $shapeFactory->getShape('Rectangle');
$rectangle->draw();

echo "<br>";
//Color Factory

$colorFactory = $checkFactory->getProducerFactory('Color');
$blue = $colorFactory->getColor('Blue');
$blue->fill();

echo "<br>";

$red = $colorFactory->getColor('Red');
$red->fill();