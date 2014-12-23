<?php
class Notes_Model extends Super_Model  {
    
    function __construct() {
        parent::__construct();
    }
    
    function getAllData() {
        $sql   = 'SELECT DATE_FORMAT(t, "%m月%d日 %H:%s") AS t, content, ' .
            'nickname FROM notes left join users on notes.userId = users.id ' .
            'ORDER BY t DESC';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
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
