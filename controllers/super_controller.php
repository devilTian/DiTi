<?php

class Super_Controller {
        
    function loadModel($fileName, $alias = 'M') {
        $model = strtolower("{$fileName}_model");
        $m_file = "models/$model.php";
        if (file_exists($m_file)) {
            try {
                require_once($m_file);
                $modelClassName = ucwords($model);
                $M = new $modelClassName();
                $this->$alias = $M;
            } catch (Exception $e) {
                throw new Exception('加载模型层失败!');
            } 
        } else {
           throw new Exception('对应的模型器文件不存在!'); 
        }
    }
    
    function loadView($fileName, $alias = 'V') {
        $view   = strtolower("{$fileName}_view");
        $v_file = "views/$model.php";
        if (file_exists($v_file)) {
            try {
                require_once($v_file);
                $viewClassName = ucwords($view);
                $V = new $viewClassName();
                $this->$alias = $V;
            } catch (Exception $e) {
                throw new Exception('加载视图层失败!');
            } 
        } else {
           throw new Exception('对应的视图文件不存在!'); 
        }
    }
}
