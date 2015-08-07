<?php
class Journey_Controller extends Super_Controller {

    function hokkaido() {
        $this->load->view('journey/hokkaido');
    }
    
    function taipei() {
        $this->load->view('journey/taipei');
    }
}