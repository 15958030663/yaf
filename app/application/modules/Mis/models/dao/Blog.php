<?php

namespace modules\Mis\models\dao;

class Blog{

	public function __construct(){
		$this->db = \bg\Db::getDb('app');
		$this->tbl = "dog.blog";
	}

	public function addBlog($data){
		if(empty($data)){
			return false;
		}
		$sql = "INSERT INTO " . $this->tbl ."(title, content, time, cid, seetime, cover) VALUES(:title, :content, :time, :cid, :seetime, :cover)";
		$data = [
			':title' => $data['title'],
			':content' => $data['content'],
			':time' => date('Y-m-d H:i:s', time()),
			':cid' => $data['cid'],
			':seetime' => $data['seetime'],
            ':cover' => $data['cover'],
		];
		$ret = $this->db->insert($sql, $data);
		if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
		}
		return $ret;
	}

	public function testpage($page){
		$sql = "SELECT id,title FROM " . $this->tbl . " LIMIT " . ($page-1) * 1 . "," . 1;
		$ret = $this->db->query($sql);
        if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
        }
		return $ret;
	}

	public function getBlogListByCategory($data){

		if(empty($data['cate'])){
			$sql = "SELECT id,title,content,cover,cid,seetime,time,left(content,20) as descr FROM " . $this->tbl . " ORDER BY time  desc LIMIT " . intval($data['page'] - 1) * 10 .", 10";
		}else{
			$sql = "SELECT id,title,content,cover,cid,seetime,time,left(content,20) as descr FROM " . $this->tbl . " WHERE cid = ".intval($data['cate'])." ORDER BY time  desc LIMIT " . intval($data['page'] - 1) * 10 .", 10";
		}

		$ret = $this->db->query($sql);
		if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
		}
		return $ret;
	}

	public function getArticleInfo($data){
		if(empty($data['id'])){
			return false;
		}
		$sql = "SELECT * FROM " . $this->tbl . " WHERE id = :id";
		$data = [
			':id' => $data['id'],
		];
		$ret = $this->db->query($sql, $data);
		if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
		}
		return $ret[0];
	}

	public function getAllNumArticle($data){
	    if(empty($data['cate'])){
            $sql = "SELECT count(id) as num FROM " . $this->tbl;
        }else{
	        $sql = "SELECT count(id) as num FROM " . $this->tbl . " WHERE cid = " . intval($data['cate']);
        }

		$ret = $this->db->query($sql);
		if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
		}
		return $ret[0];
	}

	public function getHotArticle($hot){
		$sql = "SELECT title,id FROM " . $this->tbl ." WHERE hot = :hot";
		$data =  [':hot' => $hot];
		$ret = $this->db->query($sql, $data);
		if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
		}
		return $ret;
	}

	public function getArticleById($id){
	    $sql = "SELECT * FROM " . $this->tbl . " WHERE id = :id";
	    $data = [':id' => $id];
        $ret = $this->db->query($sql, $data);
        if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
        }
        return $ret[0];
    }


    public function updateCommentUptimeByID($data){
	    if(empty($data['id'])){
	        return false;
        }

        $sql = "UPDATE " . $this->tbl . " SET comment_uptime = :comment_uptime WHERE id = :id";
	    $data = [
	        'comment_uptime' => time(),
            'id' => $data['id'],
        ];
	    $ret = $this->db->exec($sql, $data);
        if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
        }
        return $ret;
    }

    public function getLastCommentArticleList(){
        $sql = "SELECT id,title,cover,seetime,time FROM " . $this->tbl . " ORDER BY comment_uptime DESC LIMIT 5";
        $ret = $this->db->query($sql);
        return $ret;
    }

    public function addSeeTime($data){
        $sql = "UPDATE " . $this->tbl . " SET seetime = seetime + 1 WHERE id = :id";
        $data = [
            ':id' => $data['id'],
        ];
        $ret = $this->db->exec($sql, $data);
        if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
        }
        return $ret;
    }


}