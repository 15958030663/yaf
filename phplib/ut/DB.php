<?php

namespace ut;
use PDO;

class DB{

	public static $link=null;//保存连接标识符
	public static $pconnect=false;//是否开启长连接
	public static $config=array();//设置连接参数，配置信息
	public static $dbVersion=null;//保存数据库版本

	public function __destruct(){
		$this->close();
	}



	public function connect($db_conf) {
		if(!class_exists("PDO")){
			self::throw_exception("不支持PDO");
		}
		
		try{
			$dsn = "mysql:host=".$db_conf['server'].";port=".$db_conf['port'].";dbname=".$db_conf['db_name'];
			if(self::$pconnect){
				self::$link = new PDO($dsn, $db_conf['user'], $db_conf['password'], [PDO::ATTR_PERSISTENT => true]);
			}else{
				self::$link = new PDO($dsn, $db_conf['user'], $db_conf['password']);
			}
		} catch(\PDOException $e){
			throw new \Exception($e->getMessage(),$e->getCode());
			return false;
		}
		self::$link->exec('SET NAMES UTF8');
		self::$dbVersion = self::$link->getAttribute(constant("PDO::ATTR_SERVER_VERSION"));
		unset($db_conf);
		return true;
	}

	//使用预处理查询
	public function query($sql , $data = []){
		$stmt = self::$link->prepare($sql);
		$stmt->execute($data);
		if($stmt == false){
			return false;
		}
		$ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $ret;
	}

	//预处理修改
	public function exec($sql , $data){
		$stmt = self::$link->prepare($sql);
		if($stmt == false){
			return false;
		}
		return $stmt->execute($data);
	}

	//插入数据
    public function insert($sql , $data){
        $stmt = self::$link->prepare($sql);
        if($stmt == false){
            return false;
        }
        $ret = $stmt->execute($data);
        if($ret === true){
            return self::$link->lastInsertId();
        }else{
            return false;
        }
    }



	//开启事务
	public function Transaction(){
		return self::$link->beginTransaction();
	}

	//提交事务
	public function commit(){
		return self::$link->commit();
	}

	//回滚事务
	public function rollBack(){
		return self::$link->rollBack();
	}

	//释放资源
	public function close(){
		self::$link = null;
	}


	public static function throw_exception($errMsg){
		echo '<div style="width:80%;background-color:#ABCDEF;color:black;font-size:20px;padding:20px 0px;">
				'.$errMsg.'
		</div>';
	}




}