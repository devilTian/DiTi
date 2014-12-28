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
        $this->session = &load_class('session');
        $userId = $this->session->get('id');
        $nick   = $this->session->get('nickname') === false ? '新来的' :
                $this->session->get('nickname');        
        
        $this->load->model('notes', 'm');
        $data = $this->m->getAllData();
        
        $this->load->view('notes', null, array('notes'  => $data,
                                               'userId' => $userId,
                                               'nick'   => $nick));
    }
    
    function update() {
        $date    = $_POST['k'];
        $content = $_POST['content'];
        if (!empty($date) && !empty($content)) {
            if (strlen(utf8_decode($content)) > 200) {
                throw new Exception('超过200个字!');
            }
            if (!preg_match('/\d{4}\-\d{2}\-\d{2} \d{2}:\d{2}:\d{2}/', $date)) {
                throw new Exception('参数格式错误!');
            }
            $this->load->model('notes', 'm');
            if (true === $this->m->update($date, $content)) {
                echo json_encode(array('status' => 0));
            }            
            return true;
        }
    }
    
    function add() {
        if (!empty($_POST['content'])) {
            $content = $_POST['content'];
            if (strlen(utf8_decode($content)) > 200) {
                throw new Exception('超过200个字!');
            }
            $this->load->model('notes', 'm');
            $this->session = &load_class('session');
            $userId = $this->session->get('id') === false ? null :
                $this->session->get('id');         
            if (true === $this->m->add($content, $userId)) {
                echo json_encode(array('status' => 0));
            }            
            return true;
        }
    }
    
    function del() {
        $k = $_POST['k'];
        if (!preg_match('/\d{4}\-\d{2}\-\d{2} \d{2}:\d{2}:\d{2}/', $k)) {
            throw new Exception('参数格式错误!');
        }
        $this->load->model('notes');
        $this->M->del($k);
        echo json_encode(array('status' => 0));
    }
}
