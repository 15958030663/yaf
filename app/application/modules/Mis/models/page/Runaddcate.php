<?php

namespace modules\Mis\models\page;

class Runaddcate{

	public function __construct(){
		$this->server_data_cate = new \modules\Mis\models\data\Cate();
	}

	public function execute($valid_data){
		$ret = $this->server_data_cate->addCate($valid_data);
		return $ret;
	} 
}
