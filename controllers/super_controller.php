<?php
class Super_Controller {
    
    private static $instance;
    
    public $load = null;
    
    public function __construct() {
        self::$instance = &$this;
        $this->load = &load_class('loader');
    }
    
    public static function &get_instance() {
        return self::$instance;
    }
    
    public function echoRet($data, $status = true) {
        $result = array('status' => $status, 'data' => $data);            
        echo json_encode($result);
    }
}
