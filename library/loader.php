<?php

class Loader {
    
    public function model($fileName, $alias = 'M') {
        $model = strtolower("{$fileName}_model");
        $m_file = "models/$model.php";
        if (file_exists($m_file)) {
            try {
                require_once('models/super_model.php');
                require_once($m_file);
                $modelClassName = ucwords($model);
                $M = new $modelClassName();
                $CI = &get_instance();
                $CI->$alias = $M;
            } catch (Exception $e) {
                throw new Exception('加载模型层失败!');
            } 
        } else {
           throw new Exception('对应的模型器文件不存在!'); 
        }
    }
    
    public function view($fileName, $alias = null, $data = array()) {
        $tmp = explode(DIRECTORY_SEPARATOR, $fileName);
        if (count($tmp) !== 1) {
            $fileName = array_pop($tmp);
            $dir      = join(DIRECTORY_SEPARATOR, $tmp);
            if (!is_dir("views/$dir")) {
                throw new Exception('没有找到视图文件所在的路径');
            }
            $view   = strtolower("{$fileName}_view");
            $v_file = "views/$dir/$view.php";
        } else {
            $view   = strtolower("{$fileName}_view");
            $v_file = "views/$view.php";
        }
        if (file_exists($v_file)) {
            try {
                include_once($v_file);
            } catch (Exception $e) {
                throw new Exception('加载视图层失败!');
            } 
        } else {
           throw new Exception('对应的视图文件不存在!'); 
        }
    }
}
