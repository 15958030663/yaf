<?php

class RunaddcateAction extends bg\BaseAction{

	public function init(){
		$this->need_login = true;   //需要登录访问
		$this->params = ['post_name', 'post_sort', 'post_pid'];
	}

	public function invoke(){
		$server_page = new modules\Mis\models\page\Runaddcate();
		$ret = $server_page->execute($this->valid_data);
		return true;
	}

}