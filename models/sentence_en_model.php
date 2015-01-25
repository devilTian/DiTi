<?php
class Sentence_En_Model extends Super_Model {
    function __construct() {
        parent::__construct();
    }
    function getAllBook() {
        $sql = 'SELECT id, name, state, category, description, imgPath ' .
                'FROM en_book';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function getSpecBookById($id) {
        $sql = 'SELECT * FROM en_book WHERE id = ?';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($id));
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    
    function getLessonCountByBookId($id) {
        $sql = 'SELECT COUNT(*) AS sum FROM en_lesson WHERE les_bookid = ?';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($id));
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        return $data['sum'];
    }
    
    function getStudyProgressByBookId($id) {
        $sql = 'SELECT COUNT(DISTINCT les_id) AS hasListenedCount ' .
            'FROM en_recordTime WHERE les_id IN ' .
            '(select les_id from lesson where les_bookid = ?)';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($id));
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        return $data['hasListenedCount'];
    }
}
