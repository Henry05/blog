<?php
	class IndexAction extends CommonAction{
		
		public function index(){
			$this->display();
		}

		//退出登录
		public function logout(){
			session_unset();
			session_destroy();
			$this->redirect(GROUP_NAME.'/Login/index');

		}
	}
?>