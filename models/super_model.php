<?php
class Super_Model {
    
    protected $db = null;    
    
    public function __get($k) {
        $Super_Controller = &get_instance();
        return $Super_Controller->$k;
    }
    
    public function __construct() {
        $t = &load_class('database');
        $this->db = $t->getdbh();
    }  
}
