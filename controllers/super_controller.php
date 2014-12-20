<?php
class Super_Controller {
    
    private static $instance;
    
    public function __construct() {
        self::$instance = &$this;
    }
    
    public static function &get_instance() {
        return self::$instance;
    }
    
    function load($name, $path = 'library', $param = null, $alias = null) {
        $lowName = strtolower($name);
        $class   = ucfirst($lowName);
        $file    = "$path/$name.php";
        $key     = $alias === null ? $name : $alias;
        if (isset($this->load[$key])) {
            return true;
        } else if (file_exists($file)) {
            require_once($file);
            $this->load[$key] = new $class($param);
        } else {
            throw new Exception("加载的库文件[$file]不存在!");
        }
    }
        
    function loadModel($fileName, $alias = 'M') {
        $model = strtolower("{$fileName}_model");
        $m_file = "models/$model.php";
        if (file_exists($m_file)) {
            try {
                require_once('models/super_model.php');
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
    
    function loadView($fileName) {
        $view   = strtolower("{$fileName}_view");
        $v_file = "views/$view.php";
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
