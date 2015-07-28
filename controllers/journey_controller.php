<?php
class Journey_Controller extends Super_Controller {
    
    function hokkaido() {
        $this->load->view('journey/hokkaido', null, array('notes'  => 123));
    }
    
}

