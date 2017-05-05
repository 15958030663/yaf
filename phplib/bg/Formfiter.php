<?php

namespace bg;

class Formfiter{

	public function form_chceck($params){
		//如果为空
		if( count($params) == 0) {
			return array();
		}
		$valid_data = array();
		foreach( $params as $param_name) {
			//获得参数是get还是post
			$pos = strpos($param_name, "_");
			$type =  substr($param_name, 0, $pos) ;
			$param = substr($param_name, $pos+1);

			$param_conf = $this->_getParamConf( $type, $param);

			if( $param_conf === false || $param_conf == NULL) {
				return false;
			}
			$url_data = $this->_getParamUlr($type, $param_conf);
			$ret = $this->_check( $param_conf, $url_data, $valid_data);
			if($ret === false) {
				return false;
			}
		}
		return $valid_data;
	}

	//获得参数
	private function _getParamConf($type, $param) {
		//从模块找
		$module_conf_name = APPLICATION_PATH . "/conf/".MODULE."/".$type.".ini";
		if( file_exists($module_conf_name) ) {
			$config = new \Yaf\Config\Ini($module_conf_name );
			$tmp_config = $config->get($param);
			if( $tmp_config !== NULL) {
				return $tmp_config->toArray();
			}
		}

		$common_conf_name = APPLICATION_PATH . "/conf/common/".$type.".ini";
		if( file_exists($common_conf_name) )  {
			$config = new \Yaf\Config\Ini($common_conf_name);
			$tmp_config = $config->get($param);
			if( $tmp_config !== NULL) {
				return $tmp_config->toArray();
			}
		}
		return false;
	}

	private function _getParamUlr($type, $param) {
		$data = null;
		if( "post" == $type) {
			$data = htmlentities( \Yaf\Dispatcher::getInstance()->getRequest()->getPost($param['name']) );
			//表单post验证csrf
			if($param['name'] === '_csrf'){
                \bg\CsrfToken::check_csrf($data);
            }
		}elseif( "get" == $type) {

			$data = htmlentities( \Yaf\Dispatcher::getInstance()->getRequest()->getQuery($param['name']) );

		}elseif( "url" == $type) {
			$data = htmlentities( \Yaf\Dispatcher::getInstance()->getRequest()->getParam($param['name']) ) ;
		}
		return $data;
	}

	private function _check($param, $url_data, &$valid_data) {
		
		if( $url_data == null || trim($url_data) == "" ) {
			if( $param['is_option'] === "n" || intval($param['is_option']) === 1) {
				return false;
			}else {
				$valid_data[$param['name']] =  $param['default'];
				return true;
			}
		}
		
		$form_class = '\bg\formfilter\F'.$param['type'];

		$form_filter_class = new $form_class();
		
		$valid_data[$param['name']] = $form_filter_class-> vaild($url_data, $param);

		if($valid_data[$param['name']] === false){
			return false;
		}
		return true;
	}

}