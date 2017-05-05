<?php

namespace modules\Mis\models\data;

class Cate {
	
	public function __construct(){
		$this->dao = new \modules\Mis\models\dao\Cate();
	}

	public function addCate($data){
		return $this->dao->addCate($data);
	}

	public function getCateList(){
		//调用redis缓存
		$ret = \bg\CacheClass::cacheDataByRedis(__METHOD__, 'cate', function() {
			return $this->dao->getCateList();
		}, 3600);
		
		return $ret;
	}


}