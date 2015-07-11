<?php

class User_Model extends Super_Model {

    public function checkUserAndPwd($user, $pwd) {
        $sql = "SELECT id FROM users WHERE name = ? AND pwd = md5(?)";
        $sth = $this->db->prepare($sql);
        $sth->execute(array($user, $pwd));
        if ($sth->rowCount() === 1) {
            $ret = $sth->fetch(PDO::FETCH_ASSOC);
            return $ret['id'];
        } else {
            return false;
        }
    }
    
    public function getNickName($id) {
        $sth = $this->db->query("SELECT nickname FROM users WHERE id = $id");
        $ret = $sth->fetch(PDO::FETCH_ASSOC);
        $result = $ret['nickname'] === null ? false : $ret['nickname'];
        return $result;
    }
    
    public function getHeight($id) {
        $sth = $this->db->query("SELECT height FROM users WHERE id = $id");
        $ret = $sth->fetch(PDO::FETCH_ASSOC);
        $result = $ret['height'] === null ? false : $ret['height'];
        return $result;
    }
    
    public function checkUserNameIsExist($name) {
        $sql = 'SELECT id FROM users WHERE name = ?';
        $sth = $this->db->prepare($sql);
        $sth->execute(array($name));
        if ($sth->rowCount() !== 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addNewUser($user, $pwd) {
        $data = array($user, $pwd);
        $sql = 'INSERT INTO users(name, pwd, createdTime) VALUES ' .
            '(?, md5(?), CURRENT_TIMESTAMP)';
        $sth = $this->db->prepare($sql);
        $sth->execute($data);
        if ($sth->rowCount() !== 1) {
            throw new Exception('添加信息失败' . $sth->rowCount());
        }
        return $this->db->lastInsertId();
    }
    
    public function updateNickName($nickname, $id) {
        $sql = "UPDATE users SET nickname = '$nickname' WHERE id = $id";
        $count = $this->db->exec($sql);
        if ($count !== 1) {
            throw new Exception('昵称更新失败!');
        }
        return true;
    }
    
     public function updateHeight($height, $id) {
        $sql = "UPDATE users SET height = '$height' WHERE id = $id";
        $count = $this->db->exec($sql);
        if ($count !== 1) {
            throw new Exception('身高更新失败!');
        }
        return true;
    }

	public function changePassword($id, $old, $new) {
		$sql = "UPDATE users SET pwd = MD5(?) WHERE id = ? AND pwd = MD5(?)";
		$sth = $this->db->prepare($sql);
		return $sth->execute(array($new, $id, $old));
	}
}
?>
