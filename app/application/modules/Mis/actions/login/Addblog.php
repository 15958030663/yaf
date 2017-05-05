<?php

class AddblogAction extends bg\BaseAction{

	public function init(){
		$this->tpl_file = 'mis/page/addblog.html';
	}

	public function invoke(){
		$server_page = new modules\Mis\models\page\Listcate();
		$ret['list'] = $server_page->execute();
		return $ret;
	}

}