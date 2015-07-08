<?php
class Notes_Model extends Super_Model  {
    
    function __construct() {
        parent::__construct();
    }
    
    function getAllData() {
        $sql   = 'SELECT t AS orig_t, DATE_FORMAT(t, "%m月%d日 %H:%i") AS t' .
            ', content, nickname, notes.userId as userId ' .
            'FROM notes left join users on notes.userId = users.id ' .
            'ORDER BY t DESC';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    function add($content, $id = null) {        
        $sql = 'INSERT INTO notes VALUES(NOW(), ?, ?)';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($content, $id));
        $affectedRow = $sth->rowCount();            
        if ($affectedRow !== 1) {
            throw new Exception('存入新内容时出错!');
        }
        return true;
    }
    
    function update($date, $content) {
        $sql = 'UPDATE notes SET t = CURRENT_TIMESTAMP, content = ? ' .
            'WHERE t = ?';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($content, $date));
        $affectedRow = $sth->rowCount();            
        if ($affectedRow !== 1) {
            throw new Exception('更新内容时出错!');
        }
        return true;
    }
    
    function del($k) {
        $sql = 'DELETE FROM notes WHERE t = ?';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($k));
        $affectedRow = $sth->rowCount();            
        if ($affectedRow !== 1) {
            throw new Exception('删除时出错!');
        }
        return true;
    }
}
