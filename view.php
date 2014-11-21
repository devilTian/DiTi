<?php
// validate POST param
$valid = array('resume', 'healthy');
if (empty($_POST['link']) || (array_search($_POST['link'], $valid) === false)){
    throw new Exception('访问的页面非法！');
}

// get value of link param
$path = "v_{$_POST['link']}.php";
try {
    include($path);
} catch (Exception $e) {    
    throw new Exception('加载页面失败！');
}
