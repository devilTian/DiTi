<?php

class Login_Controller extends Super_Controller {
    
    public function __construct() {
        parent::__construct();                
        $this->load('session');
    }

    public function index() {
        $user = trim($_POST['u']);
        $pwd = trim($_POST['p']);
        $this->loadModel('user', 'm');
        if (strlen($user) === 0) {
            $msg = '用户名不能为空!';
        } else if (strlen($pwd) === 0) {
            $msg = '密码不能为空!';
        } else if (!$this->m->checkUserAndPwd($user, $pwd)) {
            $msg = '用户名或密码错误!';
        } else {           
            $this->load['session']->set('user', $user);
            $msg = 'success';
        }
        echo json_encode(array('msg' => $msg));
    }
    
    public function showAccountSetupForm() {
        $this->loadView('accountsetup', 'v');
    }

    public function register() {
        $user = $_POST['u'];
        $pwd = $_POST['p'];
        $this->loadModel('user', 'm');
        $this->m->addNewUser($user, $pwd);
        $this->load['session']->set('user', $user);
        echo json_encode(array('status' => 0));
    }

    public function logout() {
        $this->load['session']->destroy();
        header("location: http://{$_SERVER['SERVER_ADDR']}" .
                dirname($_SERVER['SCRIPT_NAME']) . "/frame.php");
    }
    
    public function showRegisterForm() {
        $this->loadView('register');
    }
    
    public function updateNick() {
        
    }
}

?>
