<?php

namespace modules\Mis\models\dao;

class Cate{

	public function __construct(){
		$this->db = \bg\Db::getDb('app');
		$this->tbl = "dog.cate";
	}

	public function addCate($data){
		if(empty($data)){
			return false;
		}
		$sql = "INSERT INTO " . $this->tbl . "(name, sort, pid) VALUES(:name, :sort, :pid)";
		$data = [
			':name' => $data['name'],
			':sort' => $data['sort'],
			':pid' => $data['pid'],
		];
		
		$ret = $this->db->exec($sql, $data);
		if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
		}
		return $ret;
	}

	public function getCateList(){

		$sql = "SELECT * FROM ". $this->tbl;
		$ret = $this->db->query($sql);
		
		if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
		}
		return $ret;
	}


}