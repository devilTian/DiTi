<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of session
 *
 * @author TianLoveYue
 */
class Session {
    
    public function __construct() {
        session_start();
    }
    
    public function destroy() {
        session_destroy();
    }
    
    public function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }
    
    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }
}
