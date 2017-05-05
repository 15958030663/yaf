<?php

namespace modules\Mis\models\data;

class Admin{

	public function __construct(){
		$this->dao = new \modules\Mis\models\dao\Admin();
	}

	public function checkAdmin($data){
		return $this->dao->checkAdmin($data);
	}

	public function updateLoginInfoByAdminId($data){
		return $this->dao->updateLoginInfoByAdminId($data);
	}

	
}
