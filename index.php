<?php
date_default_timezone_set('Asia/Chongqing');
$valid = array('resume', 'healthy', 'notes', 'login', 'sentence');

$defController = 'healthy';
$defFunction   = 'index';

// validate request`s controller
function redirectHomePage() {
    $path = dirname($_SERVER['SCRIPT_NAME']);
    if ($path !== '\\' && $path !== '/') {
        $path .= '/';
    }
    header("location: http://{$_SERVER['SERVER_NAME']}{$path}frame.php");
    die;
}


if (isset($_SERVER['PATH_INFO'])) {
	$segment = explode('/', trim($_SERVER['PATH_INFO'], '/'));

	if (array_search($segment[0], $valid) !== false) {
		$controller = $segment[0];
	} else {
		redirectHomePage();
	}
    $function = isset($segment[1]) && '' !== trim($segment[1]) ?
		$segment[1] : $defFunction;
} else {
	redirectHomePage();
}
$function = strtolower($function);

// load controllers
$controller = strtolower("{$controller}_controller");
$c_file = "controllers/$controller.php";

if (file_exists($c_file)) {
    try {
        require_once('controllers/super_controller.php');
        require_once($c_file);
        $controllerClassName = ucwords($controller);
        $C = new $controllerClassName();
        // validate request`s method
        if (false === method_exists($C, $function)) {
            throw new Exception('请求的方法不存在!');
        }
        $C->$function();
    } catch (Exception $e) {
        $msg = (null != $e->getMessage()) ? $e->getMessage() :
            '加载控制层失败!';
        throw new Exception($msg);
    } 
} else {
   throw new Exception('对应的控制器文件不存在!'); 
}

function &get_instance() {
    return Super_Controller::get_instance();
}

function &load_class($class, $path = 'library', $param = null, $alias = null) {
    static $_classes = array();
    if ($alias !== null) {
        $key = $alias;
    } else {
        $key = strtolower($class);
    }
    if (isset($_classes[$key])) {
        return $_classes[$key];
    }
    
    $name = ucfirst(strtolower($class));
    if (file_exists("$path/$class.php")) {
        $name = ucfirst(strtolower($class));
        if (false === class_exists($name)) {
            require("$path/$class.php");        
        }
    }
    if ($name === false) {
        throw new Exception("不能获取指定的类[$class.php]");
    }
    
    // dont keep track of what we just loaded
    
    $_classes[$key] = new $name();
    return $_classes[$key];
}
?>
