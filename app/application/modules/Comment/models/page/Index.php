<?php
/**
 * Created by PhpStorm.
 * User: noodles
 * Date: 2017/5/1
 * Time: 下午1:07
 */

namespace modules\Comment\models\page;

class Index{

    public function __construct(){
        $this->server_data_comment = new \modules\Comment\models\data\Comment();
    }

    public function execute($valid_data){
        $isEmail = self::isEmail($valid_data['email']);
        if(empty($isEmail)){
            return false;
        }
        $ret = $this->server_data_comment->addComment($valid_data);
        return $ret;
    }

    //验证邮箱
    public static function isEmail($value,$match='/^[\w\d]+[\w\d-.]*@[\w\d-.]+\.[\w\d]{2,10}$/i'){
        $v = trim($value);
        if(empty($v))
            return false;
        return preg_match($match,$v);
    }

}