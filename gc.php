<?php


error_reporting(E_ALL);
class SumSet {

    public function sum_up_recursive($numbers, $target, $partial) {        
        $s = 0;

        foreach ($partial as $x) {
            $s += $x;
        }

        if ($s == $target) { 
            return $partial;
        }

        if ($s >= $target) { 
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
            $res = $this->sum_up_recursive($remaining, $target, $partial_rec);
            if(is_array($res)) {
                return $res;
            }
        }
    }
    
    /**
     * 
     * @param type $numbers
     * @param type $target
     * @return type
     */
    public function sum_up($numbers, $target) {
        $result = array();
        return $this->sum_up_recursive($numbers, $target, $result);
    }
       
    
    /**
     * 
     * @param type $target
     * @param type $is_choice
     * @return type
     */
    public function getMinimumMaximumTarget($target,$is_choice) {
            $remi =  0 ;            
            if($target%10 == 0) {
                return $target;
            }
            if($is_choice == 1) {
                $remi = $target %10;
                return $target+(10-$remi);               
            }else {
                $remi = $target %10;
                return ($target-$remi);
            }
    }
    
    /**
     * 
     * @param type $target
     * @return int
     */
    public function getPossiblePacket($target) {
        $total_packet = array();
        $set = array(100,50,30,20);
        
        foreach($set as $set_item) {
            $count = floor($target/$set_item);
            for($i = 1;$i<=$count;$i++) {
                $total_packet[] = $set_item;
            }
        }
        return $total_packet;
    }
	
	/**
     * 
     * @param type $amount
     * @param type $is_choice
     */
    public function calculatePacket($amount , $is_choice) {
       
        $target_res = $this->getMinimumMaximumTarget($amount,$is_choice);
        $packet_arr = $this->getPossiblePacket($target_res);
        $packet_res =  $this->sum_up($packet_arr, $target_res);
        print_r("sum(" . implode($packet_res, ",") . ")=" . $target_res . "</br></br>");
    }
}

$obj = new SumSet();
$obj->calculatePacket(475,0);
?>