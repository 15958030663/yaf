<?php
/**
 * Created by PhpStorm.
 * User: noodles
 * Date: 2017/4/28
 * Time: 下午2:48
 */

namespace modules\Mis\models\page;

class Script{

    public function __construct(){
        $this->server_data_blog = new \modules\Mis\models\data\Blog();
    }

    public function execute(){
        $rst = $this->server_data_blog->getAllArticle();
        $ret = $rst[0];
        $search_param = [
            'from' => 0,
            'size' => 10,
            'word' => '文章',
        ];

        $ans = \bg\EsClient::search(\conf\Search::$blog_param, $search_param);
        if($ans === false){
            echo "search document fail";
            return false;
        }
        var_dump($ans);die;
    }

}