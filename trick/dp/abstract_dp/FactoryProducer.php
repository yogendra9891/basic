<?php
require_once "ShapeFactory.php";
require_once "ColorFactory.php";
class FactoryProducer {
	public function getFactory($string) {
		if ($string == 'Shape') {
			return new ShapeFactory();
		} else if ($string == 'Color') {
			return new ColorFactory();
		}
	}
}