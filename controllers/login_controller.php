<?php

class Login_Controller extends Super_Controller {
    
    public function __construct() {
        parent::__construct();                
        $this->session = &load_class('session');
    }
    
    public function index() {
        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata, true);
        $user = trim($request['user']);
        $pwd = trim($request['pwd']);
        $this->load->model('user', 'm');
        if (strlen($user) === 0) {
            $msg = '用户名不能为空!';
        } else if (strlen($pwd) === 0) {
            $msg = '密码不能为空!';
        } else if (false === ($id = $this->m->checkUserAndPwd($user, $pwd))) {
            $msg = '用户名或密码错误!';
        } else {           
            $this->session->set('user', $user);
            $this->session->set('id',   $id);
            $this->session->set('nickname', $this->m->getNickName($id));
            $msg = 'success';
			$this->echoRet('');
			return true;
        }
		$this->echoRet($msg, false);
    }
    
    public function checkUserName() {
        $username = $_POST['username'];
        $this->load->model('user', 'm');
        if (true === $this->m->checkUserNameIsExist($username)) {
            echo json_encode(array('status' => 1));
            return false;
        }
        echo json_encode(array('status' => 0));
    }

    public function register() {
        $user = $_POST['u'];
        $pwd  = $_POST['p'];
        $this->load->model('user', 'm');
        if (true === $this->m->checkUserNameIsExist($user)) {
            echo json_encode(array('status' => 1));
            return false;
        }
        $id = $this->m->addNewUser($user, $pwd);
        $this->session->set('user', $user);
        $this->session->set('id',   $id);
        echo json_encode(array('status' => 0));
    }

    public function logout() {
        $this->session->destroy();
		redirect();
    }
    
    public function showRegisterForm() {
        $this->load->view('register');
    }
    
    public function showAccountSetupForm() {
        $this->load->model('user', 'm');
        $data['regexp'] = '/^[a-zA-Z0-9_\-\u4E00-\u9FA5]{4,30}$/';
        if ($nick = $this->session->get('nickname')) {
            $data['nick'] = "现昵称: $nick";
        } else {
            $data['nick'] = '你还没有昵称哦~';
        }
        if (($id = $this->session->get('id')) &&
            ($height = $this->m->getHeight($id))) {
            $data['height'] = "{$height}厘米";
        } else {
            $data['height'] = '你还没有登记你的身高欧~';
        }        
        $this->load->view('accountsetup', 'v', $data);
    }
    
    public function updateNick() {
        $nickname = $_POST['v'];
        if (!preg_match('/^[a-zA-Z0-9_\-\?\p{L}]{4,30}$/u', $nickname)){
            // [hack]
            throw new Exception('请输入4-30个字符，支持中英文、数字、"_"或减号');
        }
        $this->load->model('user', 'm');
        $id = $this->session->get('id');
        $this->m->updateNickName($nickname, $id);
        $this->session->set('nickname', $nickname);
        echo json_encode(array('status' => 0));
    }
    
    public function updateHeight() {
        $height = floatval($_POST['v']);
        if ($height < 0.0 || $height > 999){
            throw new Exception('身高范围1-999');
        }
        $this->load->model('user', 'm');
        $id = $this->session->get('id');
        $this->m->updateHeight($height, $id);
        $this->session->set('height', $height);
        echo json_encode(array('status' => 0));
    }    

	public function changePassword() {
		$old = trim($_POST['o']);
		$new = trim($_POST['n']);
		if (!preg_match('/^.{6,16}$/', $old)) {
            throw new Exception('请输入6-16位数字、字母或常用符号, 字母区分大小写');
		}
		if (!preg_match('/^.{6,16}$/', $new)) {
            throw new Exception('请输入6-16位数字、字母或常用符号, 字母区分大小写');
		}
        $this->load->model('user', 'm');
        $id = $this->session->get('id');
        if ($this->m->changePassword($id, $old, $new)) {
			echo json_encode(array('status' => 0));
		} else {
			echo json_encode(array('status' => 1));
		}
	}
}
?>
