<?php
/**
 * Created by PhpStorm.
 * User: noodles
 * Date: 2017/5/1
 * Time: 下午1:21
 */

namespace modules\Comment\models\data;

class Comment{

    public function __construct(){
        $this->dao = new \modules\Comment\models\dao\Comment();
    }

    public function addComment($data){
        //插入数据库并失效重新生成缓存
        $commentID = $this->dao->addComment($data);
        if($commentID > 0){
            $param['id'] = $data['articleid'];
            $tag = "comment_article_" . $param['id'];
            \bg\CacheClass::cacheDataByRedis(__METHOD__, $tag, function () use($param){
                return $this->dao->getCommentList($param);
            }, 0);
            //更新文章表
            $server_data_blog = new \modules\Mis\models\data\Blog();
            $server_data_blog->updateCommentUptimeByID($param);
            return true;
        }
        return false;
    }


    public function getCommentList($data){
        $tag = "comment_article_" . $data['id'];
        $ret = \bg\CacheClass::cacheDataByRedis(__METHOD__, $tag, function () use($data){
            return $this->dao->getCommentList($data);
        }, 0);
       return $ret;
    }

    public function getArticleCommentNum($data){
        return $this->dao->getArticleCommentNum($data);
    }
}