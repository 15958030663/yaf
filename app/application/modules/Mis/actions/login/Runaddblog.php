<?php

class RunaddblogAction extends bg\BaseAction{

	public function init(){
		$this->params = [
			'post_cid', 
			'post_title', 
			'post_seetime', 
			'post_content'
		];
		$this->need_login = true;
	}

	public function invoke(){
		$server_page = new modules\Mis\models\page\Runaddblog();
		$ret = $server_page->execute($this->valid_data);
		return $ret;
	}

}