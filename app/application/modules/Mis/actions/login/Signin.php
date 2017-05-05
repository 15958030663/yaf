<?php

class SigninAction extends bg\BaseAction{

	public function init(){
		$this->params = ['post_username', 'post_password', 'post__csrf'];
		$this->tpl_file = false;
	}
	
	public function invoke(){
    	$server_page = new modules\Mis\models\page\Signin();
    	$ret = $server_page->execute($this->valid_data);
    	if($ret == 1){
    		\bg\Cookie::redirect('/mis');
    	}
    	return false;
   	}
    
}