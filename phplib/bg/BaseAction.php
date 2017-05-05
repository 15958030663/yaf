<?php

namespace bg;

define ("FORM_GET", 1);
define ("FORM_POST", 2);

abstract class BaseAction extends \Yaf\Action_Abstract {
	protected $params = [];		// 参数
	protected $tpl_file = false;		// 视图模板
	protected $valid_data = false;
	protected $modules = null;
	protected $need_login = false;		// 需要用户登陆
	protected $user_info = false;		// 用户信息

	public abstract function init();
	public abstract function invoke();


	public function beforeInvoke(){
	    //获取模块
		define ("MODULE", strtolower($this->getRequest()->getModuleName ()));
        //准备日志
        $log_config = new \Yaf\Config\Ini(APPLICATION_PATH . "/conf/log.ini", 'log');
        $log_config_arr = $log_config->toArray();
        $log_config_arr['strLogFile'] = ROOT_PATH . '/' . $log_config_arr['logPath'] . '/' . MODULE . ".log";

        \ut\Log::init($log_config_arr);

		$this->init();

		$formfiter = new \bg\Formfiter();
        //参数校验
		$this->valid_data = $formfiter-> form_chceck( $this->params );
		if( $this->valid_data === false) {
			return false;
		}
		
		if(MODULE === 'mis' && $this->need_login === true){
			$user_info = \bg\Session::getUserInfo();
			if($user_info['isLogin'] != 1){
				\bg\Cookie::redirect('/mis/login/show');
			}
			$this->user_info = $user_info;
		}

	}


	public function afterInvoke( $display_data ){
		$smarty_adapter = new \bg\SmartyAdapter();
		if( $this->tpl_file !== false && $_GET['debug_in'] != 1) {
			if(!is_array($display_data['data']) && !is_null($display_data['data'])){
				$res = $display_data['data'];
				unset($display_data['data']);
				$display_data['data']['status']=$res;
			}
			$display_data['data']['user_info'] = $this->user_info;
			$display_data['data']['csrf_token'] = \bg\CsrfToken::csrf_token();   //生成csrf_token
			$smarty_adapter -> assign ( $display_data );
			$smarty_adapter -> display( $this->tpl_file);
		}else {
			if(!is_array($display_data['data']) && !is_null($display_data['data'])){
				$display_data['data']['status'] = $display_data['data'];
			}
			$smarty_adapter -> ajax( $display_data );
		}
		return true;
	}

	public function execute(){
		try {
			$this->beforeInvoke();
			$ret = $this->Invoke();
		} catch (\Exception $e) {
			$msg = $e->getMessage();
			$code = $e->getCode();
			$file = $e->getFile();
			$line = $e->getLine();
            \Ut\Log::trace(sprintf('Exception File[%s] LINE[%d] CODE[%d]',$file, $line, $code));
			return false;
		}

		$this->_tpl_data['data'] =  $ret;
		
		$this->afterInvoke( $this->_tpl_data );

		return false;
	}

}