<?php
        $file = fopen('createcontract.txt', "w");
        $msg_to_write = serialize($_POST);
        fwrite($file, $msg_to_write);
        fclose($file);
?>