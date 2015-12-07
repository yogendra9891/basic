<?php

$dir = array(
    0 => 'doc5.txt',
    1 => 'test.txt',
    2 => 'test1.txt',
    3 => 'test2.txt',
    4 => 'test3.txt',
    5 => array(
        'Special Docs' => array (
              0 => 'doc4.txt',
              1 => 'doc3.txt'
          )
    ),
    6 => array(
        'ADocs' => array()
    )
);

function cmp (&$a,&$b) {
    if (is_array($a)){
        usort($a[key($a)], 'cmp');
        if (is_array ($b)) {
            return strnatcasecmp (key($a), key($b));
        } else {
            return -1;
        }
    } else {
        if (is_array ($b)) {
            return 1;
        } else {
            return strnatcasecmp ($a, $b);
        }
    }
}

usort ($dir, 'cmp');
echo "<pre>";
print_r($dir);
?>