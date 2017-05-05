<?php
/**
 * Created by PhpStorm.
 * User: noodles
 * Date: 2017/4/28
 * Time: 下午2:45
 */

class ScriptAction extends bg\BaseAction{

    public function init(){
        $this->tpl_file = false;
    }

    public function invoke(){
        $server_page = new modules\Mis\models\page\Script();
        $ret = $server_page->execute();
        return $ret;
    }

}