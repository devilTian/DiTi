<?php
class Super_Model {
    
    protected $db = null;    
    
    public function __construct() {
        $this->db = $this->database();
    }
    
    private function database() {
        return new PDO('mysql:dbname=diti;host=192.168.1.103;charset=UTF8', 'spidertianye', 'root');
    }
}
