<?php
class Sentence_Controller extends Super_Controller {
    
    private function getStateCn($state) {
        if ($state === 'W') {
            return '我想读这本书';
        } else if ($state === 'R') {
            return '我最近在读这本书';
        } else if ($state === 'C') {
            return '我读过这本书';
        } else if ($state === 'N') {
            return '';  
        } else {
            throw new Exception('图书的状态值错误!');
        }
    } 
    
    private function replication() {
        $en = '';
        $cn = '';
        $num = 0;
        $data = array();
        $this->load->model('sentence_en', 'm');
        $handle = @fopen('DB/1.txt', 'r');        
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                if (trim($buffer) === '') {
                    continue;
                } else if (preg_match('/^(\d{1,3})\.\s?(.*)/', $buffer, $match)) { // us     
                    $num = $match[1]; 
                    $en  = $match[2];
                } else {  // en
                    $cn = trim($buffer);
                    $data[] = array($num, $en, $cn, '听力口语关键句', 1);                    
                }
            }
            if (!feof($handle)) {
                throw new Exception('Error: unexpected fgets() fail.');
            }
            fclose($handle);
            $this->m->insertSentence($data);
        }
    }
    
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
        $data['stateCn'] = $this->getStateCn($data['state']);
        if ($data !== false) {
            $data['lessonCount'] = $this->m->getLessonCountByBookId($bookId);
            if (intval($data['lessonCount']) === 0) {
                $data['progress'] = '0';
            }  else {
                $data['progress']  =
                    $this->m->getFinishedLessonCountByBookId($bookId);
                $data['progress'] /= ($data['lessonCount']);
                $data['progress']  = round($data['progress'] * 100, 1);
            }
            $data['lessonData'] = $this->m->getLessonsByBookId($bookId);
        }
        $this->load->view('english/specbookinfo', 'v', $data);
    }
    
    function modifyBookReadState() {
        $this->load->model('sentence_en', 'm');
        $state = $_POST['s'];
        $id    = $_POST['id'];
        if ($this->m->setBookStateById($state, $id)) {
            echo json_encode(array('msg' => $this->getStateCn($state)));
        }
    }
}
