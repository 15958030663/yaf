<?php

namespace modules\Mis\models\page;

class Listcate{

	public function __construct(){
		$this->server_data_cate = new \modules\Mis\models\data\Cate();
	}

	public function execute(){
		$ret = $this->server_data_cate->getCateList();
		return $ret;
	} 

}