<?php
/**
 * Created by PhpStorm.
 * User: noodles
 * Date: 2017/4/5
 * Time: 下午10:10
 */
namespace bg;
use bg\Session;
use conf\BaseError;

class CsrfToken{

    public static function check_csrf($token){
        $csrf_token = Session::getSession('csrf_token');
        if($csrf_token['csrf_token'] != $token){
            throw new \Exception(BaseError::$error_static_url[BaseError::CSRF_TOKEN_CHECK_FAIL], BaseError::CSRF_TOKEN_CHECK_FAIL);
        }
        if($csrf_token['csrf_expire'] < time()){
            Session::unsetSession('csrf_token');
            throw new \Exception(BaseError::$error_static_url[BaseError::CSRF_TOKEN_TIMEOUT], BaseError::CSRF_TOKEN_TIMEOUT);
        }
    }

    public static function csrf_token(){
        $csrf_token = Session::getSession('csrf_token');
        if(empty($csrf_token)){
            return self::_make();
        }elseif ($csrf_token['csrf_expire'] < time()){
            Session::unsetSession('csrf_token');
            return self::_make();
        }else{
            return $csrf_token['csrf_token'];
        }
    }

    private static function _make(){
        $csrf_token = Session::getSession('csrf_token');
        if(empty($csrf_token)){
            $csrf_token = self::_token();
            $csrf['csrf_token'] = $csrf_token;
            $csrf['csrf_expire'] = time() + 3600;
            Session::setSession('csrf_token', $csrf);
            return $csrf_token;
        }
    }

    //生成token值
    private static function _token(){
        $csrf_token = md5(time() . uniqid(rand(), TRUE));
        return $csrf_token;
    }
}