<?php

namespace modules\Main\models\page;

class Index{

	public function __construct(){
		$this->server_data_cate = new \modules\Mis\models\data\Cate();
		$this->server_data_blog = new \modules\Mis\models\data\Blog();
		$this->server_data_search_blog = new \modules\Search\models\data\Blog();
		$this->server_data_comment = new \modules\Comment\models\data\Comment();
	}

	public function execute($valid_data){
	    if(empty($valid_data['word'])){
            $ret['list'] = $this->server_data_blog->getBlogListByCategory($valid_data);
            $ret['num'] = $this->getAllNumArticle($valid_data);
        }else{
            $ret = $this->server_data_search_blog->searchBlog($valid_data);
            $num = $ret['hits']['total'];
            $result = [];
            if(!empty($ret['hits']['hits'])){
                foreach ($ret['hits']['hits'] as $key => $value){
                    $result[$key] = $value['_source'];
                    $result[$key]['id'] = $value['_id'];
                    $result[$key]['descr'] = substr($value['_source']['content'], 0, 150);
                }
                unset($ret);
            }
            $ret['num'] = $num;   //搜索命中的总数
            $ret['list'] = $result;
        }
        $commentarticle = $this->server_data_blog->getLastCommentArticleList();

	    foreach ($ret['list'] as $key => &$value) {
            $value['cate_name'] = self::getCateName($value['cid']);
            $value['descr'] = html_entity_decode($value['descr'] . '...');
            $comment_num = $this->server_data_comment->getArticleCommentNum($value);
            $value['comment_num'] = $comment_num['num'];
        }

        if(!empty($commentarticle)){
            $ret['commentarticle'] = $commentarticle;
        }
        $ret['cate'] = $this->server_data_cate->getCateList();
        $ret['hot'] = $this->server_data_blog->getHotArticle(\conf\Blog::$blog['hot']);
        return $ret;
	}

	public static function getCateName($cid){
		switch ($cid) {
			case 1:
				$cate = 'PHP';
				break;
			case 2:
				$cate = 'Mysql';
				break;
			case 3:
				$cate = 'Linux';
				break;
			default:
				break;
		}
		return $cate;
	}

	//获取数据库文章总数
	public function getAllNumArticle($valid_data){
		$num = $this->server_data_blog->getAllNumArticle($valid_data);
		return $num['num'];
	}


}