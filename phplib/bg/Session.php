<?php

namespace bg;

class Session{

	private static function _setSessionDomain(){
		$domain_name = $_SERVER['HTTP_HOST'];
		session_set_cookie_params(18000 , '/', $domain_name);
	}
	
	/*
	 * 获得session
	 */
	public static function getSession($key){
		self::_setSessionDomain();
		//return isset($_SESSION[$key])?$_SESSION[$key]:null;
		return \Yaf\Session::getInstance()->__get ($key);
	}
	
	/*
	 *设置seesion
	 */
	public static function setSession($key, $value){
		self::_setSessionDomain();
		\Yaf\Session::getInstance()->__set ($key, $value);
	}

	public static function unsetSession($key){
		self::_setSessionDomain();
		\Yaf\Session::getInstance()->__unset ($key);
	}

	public static function getUserInfo(){
		$auth = \bg\Session::getSession('auth');
		if(!isset($auth['user_info']) || empty($auth['user_info'])) {
			return false;
		} else {
			return $auth['user_info'];
		}
	}

	public static function setUserInfo($user_info){
		$auth['user_info'] = $user_info;
		\bg\Session::setSession('auth',$auth);
		return true;
	}

}