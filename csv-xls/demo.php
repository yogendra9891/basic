<?php

  // required class
  require_once "CSVToXLSConverter2.class.php";
  // requires the PHPExcel library (www.phpexcel.net)
  // require_once "path/to/PHPExcel.php";

  // source csv file
  $csv_file = 'test.csv';
  
  // create the source test csv
  if(($fh = fopen($csv_file, 'w+')) !== false) {
    fputcsv($fh, array(
      array('Value1','Value2','Value3'),
      array('Value4','Value5','Value6')
    ));
    fclose($fh);
  }
  else {
    echo "unable to perform demo, test csv file could not be created";
    exit();
  }
  
  // start converting
  // xls filename will be automatically generated
  $converter = new CSVToExcelConverter2($csv_file); 
  $converter->skipFirstRow(false);
  $converter->convert();