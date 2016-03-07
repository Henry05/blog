<?php 
	class LoginAction extends Action{
		public function index(){
			$this->display();
		}

		//登录表单处理
		public function login(){
			if(!IS_POST){
				halt('页面不存在');
			}

			if(I('code','','strtolower') != session('verify')){
				$this->error('验证码错误');
			}

			$db = M('user');
			$user = $db->where(array('username'=>I('username')))->find();

			if(!$user || $user['password']!=I('password','','md5')){
				$this->error('账号或密码错误');
			}

			$data = array(
				'id' => $user['id'],
				'logintime' => time(),
				'loginip' => get_client_ip()
			);
			$db->save($data);

			session('uid',$user['id']);
			session('username',$user['username']);
			session('logintime',date('y-m-d H:i:s',$user['logintime']));
			session('loginip',$user['loginip']);

			redirect(__GROUP__);
		}

		//验证码
		public function verify(){
			import('Class/Image',APP_NAME);
			Image::verify();
		}
	}

?>