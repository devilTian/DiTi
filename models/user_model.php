<?php
class User_Model extends Super_Model {


    public function checkUserAndPwd($user, $pwd) {
	    $sql = "SELECT id FROM users WHERE name = ? AND pwd = md5(?)";
        $sth = $this->db->prepare($sql);
        $sth->execute(array($user, $pwd));
        $result = $sth->rowCount() === 1 ? true : false;
        return $result;
	}

	public function addNewUser($user, $pwd) {
		$data = array($user, $pwd);
		$sql  = 'INSERT INTO users VALUES (NULL, ?, md5(?), CURRENT_TIMESTAMP)';
		$sth  = $this->db->prepare($sql);
        $sth->execute($data);
        if ($sth->rowCount() !== 1) {
            throw new Exception('添加信息失败' . $sth->rowCount());
        }
		return true;
	}
}
?>
