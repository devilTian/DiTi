<?php
date_default_timezone_set('Asia/Chongqing');

// Set default controller and function.
$defController = 'health';  // [TODO]
$defFunction   = 'index';

// Analyse request.
if (isset($_SERVER['PATH_INFO'])) {  // index.php/abc/m?x=1  => /abc/m
    $segment = explode('/', trim($_SERVER['PATH_INFO'], '/'));
    if ($segment[0] === '') {        
        redirect();
    } else {
		$filePath = 'controllers';
		$i        = 0;
		while (isset($segment[$i]) && is_dir("$filePath/{$segment[$i]}")) {
			$filePath .= "/{$segment[$i]}";
			$i++; 
		}
		if (!isset($segment[$i])) {
			redirect();
		}
        $controller = $segment[$i];
        $function   = isset($segment[$i+1]) && '' !== trim($segment[$i+1]) ?
            $segment[$i+1] : $defFunction;
    }
} else {
	redirect();
}

// Modify word case about controller and function..
$controller = strtolower("{$controller}_controller");
$function   = strtolower($function);
$c_file     = "$filePath/$controller.php";

// stdout
function echoRet($data, $status = true) {
	$result = array('status' => $status, 'data' => $data);            
	echo json_encode($result);
}

// Exception Handler
function exception_handler($e) {
	echoRet($e->getMessage(), false);
	die;
}
set_exception_handler('exception_handler');

// Instantiate controller and then run method.
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

function redirect() {
	$apppath = dirname($_SERVER['SCRIPT_NAME']);
	if ($apppath !== '/' && $apppath !== '\\') {
		$apppath .= '/';
	}
	header("location: http://{$_SERVER['SERVER_NAME']}{$apppath}frame.html");
	die;
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
