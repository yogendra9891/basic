<?php
 
/**
 * Check if a file is a PNG file. Does not depend on the file's extension
 *
 * @param string $filename Full file path
 * @return boolean|null
 */
function isPngFile($filename)
{
    // check if the file exists
    if (!file_exists($filename)) {
       echo "file does not exists...";
    }
   
    // define the array of first 8 png bytes
    $png_header = array(137, 80, 78, 71, 13, 10, 26, 10);
 
    // open file for reading
    $f = fopen($filename, 'r');
 
    // loop through first 8 bytes of the file
    for ($i = 0; $i < 8; $i++) {
        // convert current character to its ascii value
        $byte = ord(fread($f, 1));
 
        // return false if it doesn't match png's header
        if ($byte !== $png_header[$i]) { echo "not png";
            fclose($f);
            return false;
        } else {
		   echo "png image";
		}
    }
    fclose($f);
 
    return true;
}
$filename = 'horse.png';
isPngFile($filename);