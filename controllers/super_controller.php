<?php
class Super_Controller {
    
    private static $instance;
    
    public $post = null;
    public $load = null;
    
    public function __construct() {
        self::$instance = &$this;
        $this->load = &load_class('loader');
        
        if (false !== ($jsonStr = file_get_contents("php://input"))) {
            $this->post = json_decode($jsonStr, true);
        }
    }
    
    public static function &get_instance() {
        return self::$instance;
    }
    
    public function echoRet($data, $status = true) {
        echoRet($data, $status);
    }
}
