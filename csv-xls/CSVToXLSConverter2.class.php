<?php  
/**  
 * CSVToExcelConverter  
 * @original-author Johnny (http://www.phpclasses.org/browse/author/631382.html) 
 * @modified dbforch 
 */  
class CSVToExcelConverter2 { 
  private $csv_file, $xls_file; 
  private $skip_first_row = true; 
   
  /** 
   * @param string $csv_file Resource path of the csv file  
   * @param string $xls_file = null Resource path of the excel file  
   */ 
  public function __construct($csv_file, $xls_file = null) { 
    $this->csv_file = $csv_file; 
    $this->xls_file = $xls_file === null ? rtrim($csv_file,'.csv').'.xlsx'; 
  } 
   
  /** 
   *  
   * @param type $set 
   */ 
  public function skipFirstRow($set = true) { 
    $this->skip_first_row = is_bool($set) ? $set : true; 
  } 
   
  /**  
   * Read given csv file and write all rows to given xls file  
   *   
   * @param string $csv_enc Encoding of the csv file, use utf8 if null  
   * @throws Exception  
   */  
  public function convert($csv_enc = null) { 
    //set cache  
    $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;  
    PHPExcel_Settings::setCacheStorageMethod($cacheMethod);  
     
    //open csv file  
    $objReader = new PHPExcel_Reader_CSV();  
    if ($csv_enc != null) 
        $objReader->setInputEncoding($csv_enc); 
    $objPHPExcel = $objReader->load($this->csv_file); 
    $in_sheet = $objPHPExcel->getActiveSheet(); 
     
    //open excel file  
    $objPHPExcel = new PHPExcel();  
    $out_sheet = $objPHPExcel->getActiveSheet();  
     
    //row index start from 0 or 1 
    $rowIterator = $in_sheet->getRowIterator($row_index = (int)$this->skip_first_row); 
    foreach ($rowIterator as $row) { 
        $cellIterator = $row->getCellIterator(); 
        $cellIterator->setIterateOnlyExistingCells(false); 

        //column index start from 0  
        $column_index = 0; 
        foreach ($cellIterator as $cell) { 
            $out_sheet->setCellValueByColumnAndRow($column_index, $row_index, $cell->getValue()); 
            $column_index++; 
        } 
        $row_index++; 
    } 
     
    //write excel file  
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);  
    $objWriter->save($this->xls_file);  
     
  }  
}