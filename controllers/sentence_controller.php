<?php
class Sentence_Controller extends Super_Controller {
    
    function index() {
        $this->show();
    }
    
    function show() {
        $this->load->model('sentence_en', 'm');
        $data['books'] = $this->m->getAllBook();
        $this->load->view('english/sentence', 'v', $data);
    }
    
    function showSpecBookDetail() {
        $this->load->model('sentence_en', 'm');
        $bookId = $_GET['id'];
        $data   = $this->m->getSpecBookById($bookId);
        if ($data === false) {
            // 找不到您想看的书的信息,抱歉啦.
            // Reveal Model~~~
        } else {        
            
        }
        var_dump($data);
    }
}
