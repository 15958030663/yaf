<?php

namespace modules\Mis\models\data;

class Blog{

	public function __construct(){
		$this->dao = new \modules\Mis\models\dao\Blog();
	}

	public function addBlog($data){
        $id = $this->dao->addBlog($data);
        $add_params = $this->dao->getArticleById($id);
        //索引文档
        $ret = \bg\EsClient::add_document(\conf\Search::$blog_param, $add_params);
        return $ret;
	}

	public function getBlogListByCategory($data){
		if(empty($data['page'])){
			$data['page'] = 1;
		}
		return $this->dao->getBlogListByCategory($data);
	}

	public function getArticleInfo($data){
//		$tag = "article_" . $data['id'];
//		$ret = \bg\CacheClass::cacheDataByRedis(__METHOD__, $tag, function() use($data){
//			return $this->dao->getArticleInfo($data);
//		}, 3600);
        return $this->dao->getArticleInfo($data);
	}

	public function getAllNumArticle($data = []){
		return $this->dao->getAllNumArticle($data);
	}
    
	public function getHotArticle($hot){
		$tag = "article_hot";
		$ret = \bg\CacheClass::cacheDataByRedis(__METHOD__, $tag, function() use($hot){
			return $this->dao->getHotArticle($hot);
		}, 3600);
		return $ret;
	}

	public function getAllArticle(){
	    return $this->dao->getAllArticle();
    }

    //更新文章表的最新评论时间
    public function updateCommentUptimeByID($data){
	    return $this->dao->updateCommentUptimeByID($data);
    }

    //获取最新评论的文章
    public function getLastCommentArticleList(){
        return $this->dao->getLastCommentArticleList();
    }

    public function addSeeTime($data){
        return $this->dao->addSeeTime($data);
    }


}