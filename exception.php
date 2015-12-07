<?php
class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}

$email = "someone@example.....com";

try {
//check for "example" in mail address
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    throw new Exception("$email is an example e-mail");
  }
  
  //check if
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    //throw exception if email is not valid
    throw new customException($email);
  }
  
}
catch(Exception $e1) {
  echo $e1->getMessage();
}
catch (customException $e) {
  echo $e->errorMessage();
}


?>
