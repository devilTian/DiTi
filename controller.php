<?php
 
if (!empty($_POST['link'])) {
    $link = $_POST['link'];
    // validate POST param
    $valid = array('resume', 'healthy', 'note');
    if (array_search($link, $valid) === false){
        throw new Exception('访问的页面非法！');        
    }

    if (file_exists("m_$link.php")) {
        try {
            require_once("m_$link.php");
        } catch (Exception $e) {    
            throw new Exception('加载model层失败！');
        } 
    }
    
    if (file_exists("v_$link.php")) {
        try {
            require_once("v_$link.php");
        } catch (Exception $e) {    
            throw new Exception('加载view层失败！');
        }        
    }
}
       
