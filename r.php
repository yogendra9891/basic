<?php
$test = array(
    [available_dates] => Array
        (
            [0] => 2014-03-02,
            [1] => 2014-03-06,
            [2] => 2014-03-07
        ),

    [location] => "New Zealand",
    [latitude] => -40.900557,
    [longitude] => 174.88597100000004,
    [searchingfor] => Array
        (
            [0] => "Bi-sexual female",
            [1] => "Couple (Girl and Girl)",
            [2] => "Soft Swap Couple and Girl on Girl Only"
        ),

    [specify_you_date] => Array
        (
            [0] => "Private Party",
            [1] => "Parking Date"
        ),

    [entertainathome] => 2,
    [personaltext] => gfghjgjgh

);
echo json_encode($test);
?>