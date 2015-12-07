<?php
require_once "AbstractFactory.php";
require_once "Red.php";
require_once "Blue.php";
class ColorFactory extends AbstractFactory {
	public function getColor($string) {
		if ($string == 'Red') {
			return new Red();
		} else if ($string == 'Blue') {
			return new Blue();
		}
	}
	
	public function getShape($string) {
	}
}