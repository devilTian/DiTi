<?php
class Notes_Model {
    
    function getdbh() {
        return new PDO('mysql:dbname=diti;host=192.168.1.103;charset=UTF8', 'spidertianye', 'root');
    }
    
    function show() {
        $dbh = $this->getdbh();
        $notes = $dbh->query('SELECT DATE_FORMAT(t, "%m月%d日 %H:%s") AS t, content, userId FROM notes ORDER BY t DESC')->fetchAll(PDO::FETCH_ASSOC);
        include('views/notes_view.php');
    }
    
    function add($content) {
        $dbh = $this->getdbh();
        $sth = $dbh->prepare('INSERT INTO notes VALUES(CURRENT_TIMESTAMP, ?, 1)');
        $sth->execute(array($content));
        $affectedRow = $sth->rowCount();            
        if ($affectedRow !== 1) {
            throw new Exception('存入新内容时出错!');
        }
        return true;
    }
}
