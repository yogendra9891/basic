<?php 

public function getAllData($limit=0, $offset, $is_count=0) {
 $sql = '';
 if($limit>0) {
   $sql = " limit ". $offset. ' '.$limit; 
 }
 $sql = "select * from Product".$sql;
 if ($is_count) {
	return count($sql);
 } else {
  return $sql;
 }
}

getAllData(0, 5, 0);
getAllData(0, 0, 1);