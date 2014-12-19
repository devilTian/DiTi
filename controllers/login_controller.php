<?php
class Login_Controller extends Super_Controller {

    public function index() {
        $user = trim($_POST['u']);
        $pwd  = trim($_POST['p']);
		$this->loadModel('user', 'm');
        if (strlen($user) === 0) {
			$msg = '用户名不能为空!';
        } else if (strlen($pwd) === 0) {
			$msg = '密码不能为空!';
        } else if (!$this->m->checkUserAndPwd($user, $pwd)) {
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
    
    private function clearSession() {
        session_start();
        session_destroy();
    }

    public function showRegisterForm() {
        $this->loadView('register', 'v');
    }
    
    public function register() {
        $user = $_POST['u'];
        $pwd  = $_POST['p'];
		$this->loadModel('user', 'm');
        $this->m->addNewUser($user, $pwd);
		$this->setSession('user', $user);
        echo json_encode(array('status' => 0));
    }
    
    public function logout() {
        $this->clearSession();
        header("location: http://{$_SERVER['SERVER_ADDR']}" .
            dirname($_SERVER['SCRIPT_NAME']) ."/frame.php");
    }
}
?>
