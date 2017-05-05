<?php

class SignoutAction extends bg\BaseAction{
	public function init(){
		$this->tpl_file = 'mis/page/login.html';
	}

	public function invoke(){
		//清空session
		\bg\Session::unsetSession('auth');
		
		\bg\Cookie::redirect('/mis/login/show');
	}
}