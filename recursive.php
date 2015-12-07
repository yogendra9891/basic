<?php
$Envelope = array(
            "Sent" => array(
                   "Date" =>  array(
				    "test" =>"right",
					"test1" =>"right1",
					"test2" => array(
					"test21" => "test21",
					"test22" => "test22"
					)
				   ),
                   "Time" => "12:10"
                ),

            "Identifier" => "KuvertNr012234",
            "AcknowledgementCode" => "minuspositivkvitt"
        );
//print_r($Envelope);
foreach ($Envelope as $t) {
 test($t);
}

function test($t)
{
 if (is_array($t)) {
 foreach ($t as $d) {
  test($d);
  }
 } else {
   echo $t."<br>";
 }
 
}
?>