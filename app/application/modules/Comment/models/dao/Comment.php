<?php
/**
 * Created by PhpStorm.
 * User: noodles
 * Date: 2017/5/1
 * Time: 下午1:25
 */

namespace modules\Comment\models\dao;

class Comment{

    public function __construct(){
        $this->db = \bg\Db::getDb('app');
        $this->tbl = "dog.comment";
    }

    public function addComment($data){
        if(empty($data)){
            return false;
        }
        $sql = "INSERT INTO " . $this->tbl . "(articleid,nickname,content,email) VALUES(:articleid, :nickname, :content, :email)";
        $data = [
            ':articleid' => $data['articleid'],
            ':nickname' => $data['nickname'],
            ':content' => $data['content'],
            ':email' => $data['email'],
        ];
        $ret = $this->db->insert($sql, $data);
        if($ret == false){
            \ut\Log::warning ( sprintf ( "class[%s] %s exec sql [%s] fail",__CLASS__, __FUNCTION__, $sql ) );
            return false;
        }
        return $ret;
    }

    public function getCommentList($data){
        $sql = "SELECT nickname,content,time FROM " . $this->tbl . " WHERE articleid = :id";
        $data = [
            ':id' => $data['id'],
        ];
        $ret = $this->db->query($sql, $data);
        return $ret;
    }

    public function getArticleCommentNum($data){
        if(empty($data['id'])){
            return false;
        }
        $sql = "SELECT count(id) as num FROM " . $this->tbl . " WHERE articleid = :id";
        $data = [
            ':id' => $data['id'],
        ];
        $ret = $this->db->query($sql, $data);
        return $ret[0];
    }
}
