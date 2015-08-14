<?php
class Navigation_Model extends Super_Model {
    
    function getAllData() {
        $sql = 'SELECT id,name,link,privilege,pid FROM navigation ' .
			'ORDER BY pid = -1 DESC';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
