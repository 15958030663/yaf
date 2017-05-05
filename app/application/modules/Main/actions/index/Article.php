<?php

class ArticleAction extends bg\BaseAction{

	public function init(){
		$this->params = ['get_id'];
		$this->tpl_file = "main/page/show.html";
	}
	
	public function invoke(){
		$server_page = new modules\Main\models\page\Article();
		$ret = $server_page->execute($this->valid_data);
		return $ret;
   	}
   	
}