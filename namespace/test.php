<?php
namespace test;

	class SomeObject
	{
		private $variable;
		
		public function __construct($variable = null)
		{
		 $this->setVariable($variable);
		}
	
		public function getVariable() { return $this->variable; }
		public function setVariable($value) { $this->variable = $value; }
	}

namespace test_second;

	class SomeObject
	{
		private $variable;
		
		public function __construct($variable = null)
		{
		 $this->setVariable($variable);
		}
	
		public function getVariable() { return $this->variable; }
		public function setVariable($value) { $this->variable = $value; }
	}
	
?>
