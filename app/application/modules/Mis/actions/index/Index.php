<?php

class IndexAction extends bg\BaseAction{

	public function init(){
		$this->need_login = true;   //需要登录访问
		$this->tpl_file = "mis/page/index.html";
	}
	
	public function invoke(){
		// $db = \bg\Db::getDb('app');
		// $sql = "INSERT INTO dog.coma(name, age) VALUES(:name, :age)";
		// $data = ['name' => 'wll', 'age'=>18];
		// $res = $db->query($sql, $data);
		// print_r($res);die;
		$baidu = "www.baidu.com";
		
    	$ret = ['a' => "<a>test</a>"];
    	return $ret;
   	}
   	
}