<?php
/**
 * Created by PhpStorm.
 * User: noodles
 * Date: 2017/5/1
 * Time: 下午12:39
 */
class IndexAction extends bg\BaseAction{
    public function init(){
        $this->tpl_file = false;
        $this->params = ['post_articleid', 'post_nickname', 'post_email', 'post_content'];
        $this->need_login = false;
    }

    public function invoke(){
        $server_page = new modules\Comment\models\page\Index();
        $ret = $server_page->execute($this->valid_data);
        //跳转文章页面
        \bg\Cookie::redirect('/main/article?id=' . $this->valid_data['articleid']);
    }
}