<?php
    $a = $_SERVER['HTTP_IF_MODIFIED_SINCE'];
    if (strtotime($a) + 5 > time()) {
        header("HTTP/1.1 304");
        exit(1);
    }    
    header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . " GMT");
    echo time();
    phpinfo();
?>