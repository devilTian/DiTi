<?php

class Login_Controller extends Super_Controller {
    
    public $regexp = array(
        'nickname' => '/^[a-zA-Z0-9_\-\u4E00-\u9FA5]{4,30}$/');
    
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
        } else if (false === ($id = $this->m->checkUserAndPwd($user, $pwd))) {
            $msg = '用户名或密码错误!';
        } else {           
            $this->load['session']->set('user', $user);
            $this->load['session']->set('id',   $id);
            $this->load['session']->set('nickname', $this->m->getNickName($id));
            $msg = 'success';
        }
        echo json_encode(array('msg' => $msg));
    }

    public function register() {
        $user = $_POST['u'];
        $pwd = $_POST['p'];
        $this->loadModel('user', 'm');
        $id = $this->m->addNewUser($user, $pwd);
        $this->load['session']->set('user', $user);
        $this->load['session']->set('id',   $id);
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
    
    public function showAccountSetupForm() {
        if ($nick = $this->load['session']->get('nickname')) {
            $this->nick = "现昵称: $nick";
        } else {
            $this->nick = '你还没有昵称哦~';
        }
        $this->loadView('accountsetup', 'v');
    }
    
    public function updateNick() {
        $nickname = $_POST['v'];
        if (!preg_match('/^[a-zA-Z0-9_\-\?]{4,30}$/',  utf8_decode($nickname))){
            // [hack]
            throw new Exception('请输入4-30个字符，支持中英文、数字、"_"或减号');
        }
        $this->loadModel('user', 'm');
        $id = $this->load['session']->get('id');
        $this->m->updateNickName($nickname, $id);
        $this->load['session']->set('nickname', $nickname);
        echo json_encode(array('status' => 0));
    }
}
?>
