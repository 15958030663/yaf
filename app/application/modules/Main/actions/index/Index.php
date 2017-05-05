<?php

class IndexAction extends bg\BaseAction{

	public function init(){
		$this->params = ['get_cate', 'get_page', 'get_word'];      //参数校验
		$this->tpl_file = "main/page/index.html";      //渲染模版
		$this->need_login = false;
	}
	
	public function invoke(){
		$server_page = new modules\Main\models\page\Index();
		$ret = $server_page->execute($this->valid_data);
		$cate = $this->valid_data['cate'];
		$word = $this->valid_data['word'];
		if(empty($cate)){
			$url = '/?';
		}elseif ($cate == 1) {
			$url = '/?cate=1';
		}elseif ($cate == 2) {
			$url = '/?cate=2';
		}else{
			$url = '/?cate=3';
		}

		if(!empty($word)){
		    $url .= 'word=' . $word;
        }
        $pages = round($ret['num']/10, 2);
		if($pages <= 1){
            $pages = 1;
        }else{
		    $pages = ceil($pages);
        }
        //$pages = ceil(round($ret['num']/10, 2));
		$ret['pages'] = $pages;
		$ret['pagebar'] = \bg\Pagebar::getPageHtml($this->valid_data['page'], $pages, $url);
		$ret['word'] = $word;
		return $ret;
   	}
   	
}