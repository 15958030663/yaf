<?php

class ListcateAction extends bg\BaseAction{

	public function init(){
		$this->need_login = true;
		$this->tpl_file = 'mis/page/listcate.html';
	}

	public function invoke(){
		$server_page = new modules\Mis\models\page\Listcate();
		$ret['list'] = $server_page->execute();
		return $ret;
	}

}