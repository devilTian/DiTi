<?php
class Login_Controller extends Super_Controller {

	public function index() {
		$user = trim($_POST['u']);
		$pwd  = trim($_POST['p']);
		if (strlen($user) === 0) {
			$msg = '用户名不能为空!';
		} else if (strlen($pwd) === 0) {
			$msg = '密码不能为空!';
		} else if (!$this->checkUserExist($user, $pwd)) {
			$msg = '用户名或密码错误!';
		} else {
			$this->setSession('user', $user);
			$msg = 'success';
		}
		echo json_encode(array('msg' => $msg));
	}

	private function getSession($k) {
		session_start();
		if (!isset($_SESSON[$k])) {
			return false;
		}
		return $_SESSION[$k];
	}

	private function setSession($k, $v) {
		session_start();
		$_SESSION[$k] = $v; 
	}

	// [todo] MOVE TO model layer
    private function getdbh() {
        return new PDO('mysql:dbname=diti;host=192.168.1.103;charset=UTF8', 'spidertianye', 'root');
	}

	private function checkUserExist($user, $pwd) {
		$dbh = $this->getdbh();
		$sth = $dbh->prepare('SELECT id FROM users WHERE name = ? AND pwd = ?');
		$sth->execute(array($user, $pwd));
		$result = $sth->rowCount() === 1 ? true : false;
		return $result;
	}

}
?>
