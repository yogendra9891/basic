<?php 

$c = 'FranÃ§ais';
echo utf8_encode('Espa\u00f1ol');
$g = convert_smart_quotes('Espa\u00f1ol');
echo $g;
echo "<br>";
echo utf8_to_html($g);

function convert_smart_quotes($string) {
    
    
    $search = array(chr(0xe2) . chr(0x80) . chr(0x98),
                    chr(0xe2) . chr(0x80) . chr(0x99),
                    chr(0xe2) . chr(0x80) . chr(0x9c),
                    chr(0xe2) . chr(0x80) . chr(0x9d),
                    chr(0xe2) . chr(0x80) . chr(0x93),
                    chr(0xe2) . chr(0x80) . chr(0x94),
                    chr(226) . chr(128) . chr(153),
                    
                    'â€™','â€œ','â€<9d>','â€"','Â  ', 'Â',
                    
                    chr(145), 
                    chr(146), 
                    chr(147), 
                    chr(148), 
                    chr(151)
                    
                    );

     $replace = array("'","'",'"','"',' - ',' - ',"'","'",'"','"',' - ',' ','',"'", 
                     "'", 
                     '"', 
                     '"', 
                     '-');
     return str_replace($search, $replace, $string);
     
    }
	
function utf8_to_html($data) {
    
    
return preg_replace(
    array (
        '/ä/',
        '/ö/',
        '/ü/',
        '/é/',
        '/à/',
        '/’/',
        '/‘/',
        '/”/',
        '/–/',
        '/£/',
        '/Â/',
        '/è/'
    ),
    array (
        '&auml;',
        '&ouml;',
        '&uuml;',
        '&eacute;',
        '&agrave;',
        "'",
        "'",
        '"',
        '-',
        '&pound;',
        '',
        '&egrave;'
    ),
    $data );
    
    }
?>