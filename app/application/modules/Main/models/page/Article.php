<?php

namespace modules\Main\models\page;

class Article{

	public function __construct(){
		$this->server_data_blog = new \modules\Mis\models\data\Blog();
		$this->server_data_cate = new \modules\Mis\models\data\Cate();
        $this->server_data_comment = new \modules\Comment\models\data\Comment();
    }

	public function execute($valid_data){

		$ret = $this->server_data_blog->getArticleInfo($valid_data);
		//添加一次观看次数
        $this->server_data_blog->addSeeTime($valid_data);

		$cate = $this->server_data_cate->getCateList();
		$commentlist = $this->server_data_comment->getCommentList($valid_data);
		$num = $this->server_data_blog->getAllNumArticle();
		$commentarticle = $this->server_data_blog->getLastCommentArticleList();
		foreach ($cate as $key => $value) {
			if($value['id'] === $ret['cid']){
				$ret['cate'] = $value;
			}
		}
        $ret['num'] = $num['num'];
		$ret['catelist'] = $cate;
		$ret['content'] = html_entity_decode($ret['content']);
		if(!empty($commentlist)){
		    $ret['commentlist'] = $commentlist;
        }
        if(!empty($commentarticle)){
		    $ret['commentarticle'] = $commentarticle;
        }
		return $ret;
	}


}