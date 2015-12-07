<?php
/**
* defining  the interface
*/
interface IAnimal
{
  const CAN_FLY_MSG     = "I can fly very high";
  const CAN_NOT_FLY_MSG = "Sorry I can't fly";
  public function tryToFly();
  public function talk();
}
