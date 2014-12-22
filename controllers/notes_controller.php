<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notes_controller
 *
 * @author TianLoveYue
 */
class Notes_Controller extends Super_Controller {
    
    function index() {
        $this->load->model('notes', 'm');
        $this->m->show();
    }
    
    function add() {        
        if (!empty($_POST['content'])) {
            $content = $_POST['content'];
            if (strlen(utf8_decode($content)) > 200) {
                throw new Exception('超过200个字!');
            }
            $this->load->model('notes', 'm');
            if (true === $this->m->add($content)) {
                echo json_encode(array('status' => 0));
            }            
            return true;
        }
    }
}
