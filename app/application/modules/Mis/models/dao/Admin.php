<?php

namespace modules\Mis\models\dao;

class Admin{

	public function __construct(){
		$this->db = \bg\Db::getDb('app');
		$this->tbl = "dog.admin";
	}

	public function checkAdmin($data){
		if(empty($data)){
			return false;
		}
		$sql = "SELECT adminid FROM " . $this->tbl . " WHERE username=:username AND password=:password";
		$ret = $this->db->query($sql, [':username' => $data['username'], ':password' => md5($data['password'])]);
		if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
		}
		return $ret[0];
	}

	public function updateLoginInfoByAdminId($data){
		if(empty($data)){
			return false;
		}
		$sql = "UPDATE " . $this->tbl . " SET logintime=:logintime, loginip=:loginip WHERE adminid=:adminid";
		$data = [
			':logintime' => $data['logintime'],
			':loginip' => $data['loginip'],
			':adminid' => $data['adminid'],
		];
		$ret = $this->db->exec($sql, $data);
		if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
		}
		return $ret;
	}
	
}