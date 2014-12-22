<?php
$uri   = substr($_SERVER['REQUEST_URI'], strlen($_SERVER['SCRIPT_NAME']));
$parts = preg_split('/\?/', $uri);

$uri = $parts[0];
if(isset($parts[1])) {
    $_SERVER['QUERY_STRING'] = $parts[1];
    parse_str($_SERVER['QUERY_STRING'], $_GET);
} else {
    $_SERVER['QUERY_STRING'] = '';
    $_GET = array();
}
$uri = str_replace(array('//', '../'), '/', trim($uri, '/'));
$segment = explode('/', $uri);

$defController = 'healthy';
$defFunction   = 'index';

$controller = isset($segment[0]) ? $segment[0] : $defController;
$function   = isset($segment[1]) ? $segment[1] : $defFunction;
$function   = strtolower($function);

// validate request`s controller
$valid = array('resume', 'healthy', 'notes', 'login');
if (array_search($controller, $valid) === false){
    $path = dirname($_SERVER['SCRIPT_NAME']);
    if ($path !== '\\' && $path !== '/') {
        $path .= '/';
    }
    header("location: http://{$_SERVER['SERVER_ADDR']}{$path}frame.php");
    die;
}

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
