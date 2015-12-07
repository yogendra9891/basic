<?php
$img = 'https://prod.sixthcontinent.com/uploads/users/media/original/50170/';

if(1) {
 $insert = imagecreatefromjpeg(prepareURL($img.'1415860517hydrangeas.jpg'));
 //$insert = imagecreatefromjpeg($img.'1415860517hydrangeas.jpg');
} else {
 echo "no image";
}

function prepareURL($url) {
    // pass a url that looks like this "http://www.example.com/path/to/file with spaces.jpg";
    
    //get the path component
    $path = parse_url($url, PHP_URL_PATH);
    
    //reduce the path component to an array
    $t_path = explode('/', $path); 
    
    foreach ($t_path as $segment){
        $t_segment[] = rawurlencode($segment);
    }
    
    //recompact into string
    $t_path = implode("/", $t_segment);
    
    //insert the changed path into the url
    return str_replace($path, $t_path, $url);
}