<?php
class Notes_Model extends Super_Model  {
    
    function __construct() {
        parent::__construct();
    }
    
    function show() {
        $notes = $this->db->query('SELECT DATE_FORMAT(t, "%m月%d日 %H:%s") AS t, content, userId FROM notes ORDER BY t DESC')->fetchAll(PDO::FETCH_ASSOC);
        include('views/notes_view.php');
    }
    
    function add($content) {
        $sth = $this->db->prepare('INSERT INTO notes VALUES(CURRENT_TIMESTAMP, ?, 1)');
        $sth->execute(array($content));
        $affectedRow = $sth->rowCount();            
        if ($affectedRow !== 1) {
            throw new Exception('存入新内容时出错!');
        }
        return true;
    }
}
