<?php
class Sentence_Controller extends Super_Controller {
    
    function index() {
        $this->show();
    }
    
    function show() {
        $this->load->view('english/sentence');
    }    
}
