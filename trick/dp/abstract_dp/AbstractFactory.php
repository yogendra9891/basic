<?php
abstract class AbstractFactory {
	public abstract function getColor($string);
	public abstract function getShape($string);
}