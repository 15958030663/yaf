<?php
/**
 * Created by PhpStorm.
 * User: noodels
 * Date: 2017/4/28
 * Time: 下午5:48
 */


namespace modules\Search\models\data;

class Blog{

    public function __construct(){
    }

    public function searchBlog($valid_data){

        if(empty($valid_data['page'])){
            $valid_data['page'] = \conf\Blog::$blog['page'];
        }

        $search_param = [
            'from' => ($valid_data['page'] - 1) * \conf\Blog::$blog['num'],
            'size' => \conf\Blog::$blog['num'],
            'word' => $valid_data['word'],
        ];

        $ret = \bg\EsClient::search(\conf\Search::$blog_param, $search_param);
        if($ret === false){
            return false;
        }
        return $ret;
    }


}