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
    
    function getLessonsByBookId($id) {
        $sql    = 'SELECT les_num, les_name, les_unit, les_score, ' .
            'max(datetime) as datetime, count(datetime) as count ' .
            'FROM en_lesson left join en_recordTime ' .
            'on en_lesson.les_id = en_recordTime.les_id ' .
            'WHERE les_bookid = ? group by en_lesson.les_id';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($id));
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function getLessonCountByBookId($id) {
        $sql = 'SELECT COUNT(*) AS sum FROM en_lesson WHERE les_bookid = ?';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($id));
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        return $data['sum'];
    }
    
    function getFinishedLessonCountByBookId($id) {
        $sql = 'SELECT COUNT(*) AS c FROM en_recordTime WHERE les_id IN ' .
            '(select les_id from en_lesson where les_bookid = ?) ' .
            'GROUP BY les_id';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($id));
        $ret = $sth->fetch(PDO::FETCH_ASSOC);
        return $ret['c'];
    }
    
    function setBookStateById($state, $id) {
        $sql = 'UPDATE en_book SET state = ? WHERE id = ?';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($state, $id));
        $affectedRow = $sth->rowCount();            
        if ($affectedRow !== 1) {
            throw new Exception('更新新内容时出错!');
        }
        return true;
    }
}
