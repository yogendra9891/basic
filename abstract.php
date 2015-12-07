<?php
/**
*
*/
abstract class Animal
{
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    /**
	*
	*/
    public function printOut() {
        echo $this->getValue() . "\n";
    }
}

class ConcreteClass extends AbstractClass
{
    protected function getValue() {
        return "ConcreteClass";
    }

    public function prefixValue($prefix) {
        return "$prefix ConcreteClass";
    }
}

$class1 = new ConcreteClass();
$class1->printOut();
echo $class1->prefixValue('FOO_') ."\n";
?>