<?php


namespace bg;

class SmartyAdapter {

	/**
	 * Smarty object
	 * @var Smarty
	 */
	public $_smarty;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		require_once (LIB_PATH . '/bg/smarty/Smarty.class.php');

		$this->_smarty = new \Smarty();
		$smarty_config = \Yaf\Application::app()->getConfig()->smarty;
		foreach( $smarty_config as $key => $value) {
			$this->_smarty->$key = $value;
		}
		$this->_smarty->addPluginsDir( LIB_PATH. "/bg/smarty/plugin" );
	}

	
	public function assign( $fis_data ){
		$this->_smarty->assign( $fis_data );
	}

	public function display( $tpl ){
		$this->_smarty->display( $tpl );
	}

	public function ajax( $fis_data) {
		header("Content-type: application/json;charset=utf-8");
		$json_data = json_encode($fis_data, JSON_UNESCAPED_UNICODE);		
		echo $json_data;
		exit;
	}
}
