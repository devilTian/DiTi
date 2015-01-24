<?php
class Sentence_En_Model extends Super_Model {
    function __construct() {
        parent::__construct();
    }
    function getAllBook() {
        $sql = 'SELECT id, name, state, category, description, imgPath ' .
                'FROM book';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function getSpecBookById($id) {
        $sql = 'SELECT * FROM book WHERE id = ?';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($id));
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
}
