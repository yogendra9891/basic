<?php
require_once "AbstractFactory.php";
require_once "Circle.php";
require_once "Rectangle.php";

class ShapeFactory extends AbstractFactory {
	public function getColor($string) {
	}
	
	public function getShape($string) {
		if ($string == 'Circle') {
			return new Circle();
		} else if ($string == 'Rectangle') {
			return new Rectangle();
		}	
	}
}