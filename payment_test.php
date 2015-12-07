<?php

echo ini_get('display_errors');

class SumSet {

    public function sum_up_recursive($numbers, $target, $partial, $c) {
        //echo "[In SumSet.sum_up_recursive(Array[". implode($numbers,",") . "], " . $target . ", Array[" . implode($partials, ",") . "])]</br></br>";
        $s = 0;

        foreach ($partial as $x) {
            $s += $x;
        }

        if ($s == $target) {
           // print_r($c . ": sum(" . implode($partial, ",") . ")=" . $target . "</br></br>"); exit;
		   return $partial;
        }

        if ($s >= $target) {
            //echo "[In SumSet.sum_up_recursive().return]</br>"; 
            return;
        }

        for ($i = 0; $i < count($numbers); $i++) {
            $remaining = array();
            $n = $numbers[$i];
            for ($j = $i + 1; $j < count($numbers); $j++) {
                $remaining[] = $numbers[$j];
            }
            $partial_rec = $partial;
            $partial_rec[] = $n;
			
            $s = $this->sum_up_recursive($remaining, $target, $partial_rec, $c);
			if (is_array($s)) {
			     return $s;
			}
        }
    }

    public function sum_up($numbers, $target) {
        //echo "[In SumSet.sum_up(Array[". implode($numbers, ",") . "], " . $target . ")]</br></br>";
        $result = array();
        print_r($this->sum_up_recursive($numbers, $target, $result, 1)); exit;
    }

    public function main() {
        //echo "[In SumSet.main()]</br></br>";
		$target = 770;
		$this->copuon($target);        
    }
	
	public function copuon($target) {
		$numbers  = array();
		$set = array(100, 50, 30, 20);
		foreach ($set as $x) {
			$count =  floor($target/$x);
			for ($i = 0 ; $i<$count; $i++ ) {
			    $numbers[] = $x;
			}
		}
		$this->sum_up($numbers, $target);
	}

}

$obj = new SumSet();
$obj->main();
?>