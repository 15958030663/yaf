<?php

namespace modules\Mis\models\page;

class Signin{
	
	public function __construct(){
		$this->server_data_signin = new \modules\Mis\models\data\Admin();
	}	



	public function execute($valid_data){
		//登录时间
		$valid_data['logintime'] = date('Y-m-d H:i:s', time());
		//获取ip
		$valid_data['loginip'] = \ut\Ip::getClientIp();
		$admin_info = $this->server_data_signin->checkAdmin($valid_data);
		if(!empty($admin_info['adminid'])){
			$valid_data['adminid'] = $admin_info['adminid'];
			$admin_info['isLogin'] = 1;
			\bg\Session::setUserInfo($admin_info);
		}
		$user_info = \bg\Session::getUserInfo();

		//更新登录信息
		if($user_info['isLogin'] === 1 ){
			$this->updateLoginInfomation($valid_data);
		}

		return $user_info['isLogin'];
	}

	public function updateLoginInfomation($data){
		return $this->server_data_signin->updateLoginInfoByAdminId($data);
	}

}