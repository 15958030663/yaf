<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/4/6
 * Time: 上午12:24
 */
namespace conf;

class BaseError{
    const OK = 0;

    const CSRF_TOKEN_TIMEOUT = 40801;
    const CSRF_TOKEN_CHECK_FAIL = 40802;

    public static $error_static_url;
}

BaseError::$error_static_url = [
    BaseError::OK => 'OK',
    BaseError::CSRF_TOKEN_TIMEOUT => 'csrf_token超时',
    BaseError::CSRF_TOKEN_CHECK_FAIL => 'csrf_token验证失败',
];

