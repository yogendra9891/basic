<?php
class Obj
{
    public $id;
    public $size;
    public $color;
    function __construct($id, $size, $color)
    {
        $this->id = $id;
        $this->size = $size;
        $this->color = $color;
    }
}
class Color
{
    public $green;
    public $blue;
    public $red;
    function __construct($green, $blue, $red)
        {
        $this->green = $green;
        $this->blue = $blue;
        $this->red = $red;
    }
}
$color = new Color(23, 42, 223);
$obj1 = new Obj(23, "small", $color);
$obj2 = clone $obj1; //shallow copy
 //$obj2 = $obj1; //clone (deep copy)
$obj2->id++;
$obj2->color->red = 255;
$obj2->size = "big";
 
echo "<pre>";print_r($obj1);
echo "<pre>";print_r($obj2);
?>
