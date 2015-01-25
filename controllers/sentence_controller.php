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
        if ($data !== false) {
            $data['lessonCount'] = $this->m->getLessonCountByBookId($bookId);
            if (intval($data['lessonCount']) === 0) {
                $data['progress'] = '0';
            }  else {
                $data['progress'] = $this->m->getStudyProgressByBookId($bookId);
                $data['progress'] /= ($data['lessonCount']);
                $data['progress'] = round($data['progress'] * 100, 1);
            }            
        }
        $this->load->view('english/specbookinfo', 'v', $data);
    }
}
