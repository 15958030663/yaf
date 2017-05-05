<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/4/6
 * Time: 下午10:28
 */
namespace bg;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;

class Qiniu{

    public static $accessKey = 'UhTlsd7fZgf0leM-dI3PWFzhzGLe-wil-KnZT36h';
    public static $secretKey = '_4-dggRuGdt621EziUfUa8J5faKj2FlcSRvZt2Xp';
    public static $pic_host = 'http://onzqo4moo.bkt.clouddn.com/';

    public function __construct(){
        $file = LIB_PATH . 'vendor/Qiniu/functions.php';
        if(file_exists($file)) {
            require_once $file;
        } else {
            return false;
        }
    }

    public static function uploadStream($bucket, $data, $des_path) {
        // 构建鉴权对象
        $auth = new Auth(self::$accessKey, self::$secretKey);
        if( $auth === false) {
            return false;
        }

        // 生成上传 Token
        $token = $auth->uploadToken($bucket);

        $uploadMgr = new UploadManager();

        list($ret, $err) = $uploadMgr->put($token, $des_path, $data);
        if ($err !== null) {
            return false;
        } else {
            return true;
        }

    }

    public static function upload($bucket, $src_path, $des_path){
        // 构建鉴权对象
        $auth = new Auth(self::$accessKey, self::$secretKey);
        if( $auth === false) {
            return false;
        }

        // 生成上传 Token
        $token = $auth->uploadToken($bucket);
        $uploadMgr = new UploadManager();

        list($ret, $err) = $uploadMgr->putFile($token, $des_path, $src_path);
        if ($err !== null){
            return false;
        } else {
            return true;
        }
    }

    public static function QiniuDel($bucket,$key){
        // 构建鉴权对象
        $auth = new Auth(self::$accessKey, self::$secretKey);
        if( $auth === false) {
            return false;
        }
        $bucketMgr = new BucketManager($auth);
        $err = $bucketMgr->delete($bucket, $key);
        if ($err !== null) {
            var_dump($err);
        } else {
            echo "Success!";
        }
    }


    public static function getWDImage($pic_url, $w, $h){
        return $pic_url."?imageView2/0/w/$w/h/$h/interlace/1";
    }


}