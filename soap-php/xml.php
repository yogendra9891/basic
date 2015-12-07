<?php

$file = '<?xml version="1.0" encoding="UTF-8"?>
<from><a1><a>Jani</a><a>nani</a><b>Joni</b><b>noni</b></a1><a2><a>Jani1</a><a>nani1</a></a2><s>ass</s></from>';
$xml = simplexml_load_string($file);

 print_r($xml);
 echo json_encode($xml);
?>
