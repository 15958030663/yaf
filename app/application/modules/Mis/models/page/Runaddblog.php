<?php

namespace modules\Mis\models\page;

use bg\Qiniu;

class Runaddblog{

	public function __construct(){
		$this->server_data_blog = new \modules\Mis\models\data\Blog();
	}

	public function execute($valid_data){
	    if($_FILES['cover']['error'] == 0){
            //上传图片
            $uploadret = $this->uploadPicToQiniu($_FILES, $valid_data);
            if($uploadret === true){
                $ret = $this->server_data_blog->addBlog($valid_data);
            }
            return true;
        }
        return false;
	}

	public function uploadPicToQiniu($file, &$valid_data){
        $uploadpic = new \bg\Qiniu();
        $uniqid = uniqid();
        $domain = strstr($file['cover']['name'],'.');
        $key = 'up/blog/'.$uniqid.$domain;
        $valid_data['cover'] = \conf\Blog::$blog['picHost'] . $key;
        $ret = $uploadpic->upload('blog',$file['cover']['tmp_name'],$key);
        return $ret;
    }

}