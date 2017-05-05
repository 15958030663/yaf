<?php

namespace bg;
use Redis;

class RedisExt{
	
	private static $_client = [];

	private static function init($redis_name){
		//未被实例化
		if( !isset($_client[$redis_name]) ){
			if( !isset(\conf\Db::$redis[$redis_name]) ){
				return false;
			}

			$redis_conf = \conf\Db::$redis[$redis_name];
			if( !isset(\bg\RedisExt::$_client[$redis_name]) ){
				\bg\RedisExt::$_client[$redis_name] = new Redis();
				try {
					\bg\RedisExt::$_client[$redis_name]->connect($redis_conf["ip"], $redis_conf['port']);
					if(!is_resource(\bg\RedisExt::$_client[$redis_name]->socket)){
						return false;
					}
				}catch(\Exception $e){
					throw new \Exception($e->getMessage(),$e->getCode());
					return false;
				}
			}
		}

	}

	public static function getRedis($redis_name){
		$ret = RedisExt::init($redis_name);
		if($ret === false){
			return false;
		}
		return \bg\RedisExt::$_client[$redis_name];
	}

	public function set($key, $value, $expire_time = 0, $redis_name = "online"){
		$redis_ins = self::getRedis($redis_name);
		if( $redis_ins == NULL || $redis_ins === false) {
			return false;
		}
		if( $expire_time > 0){
			$ret = $redis_ins->setex($key, $expire_time, $value);
		}else {
			$ret = $redis_ins->set($key, $value);
		}
		if($ret === false){
			return false;
		}
		return true;
	}

	public function get($key, $redis_name = "online"){
		$redis_ins = self::getRedis($redis_name);
		if( $redis_ins == NULL || $redis_ins === false) {
			return false;
		}
		return $redis_ins->get($key);
	}

	public function del($key, $redis_name = "online"){
		$redis_ins = self::getRedis($redis_name);
		if( $redis_ins == NULL || $redis_ins === false) {
			return false;
		}
		return $ret = $redis_ins->delete($key);
	}

	public function exists($key, $redis_name = "online"){
		
		$redis_ins = self::getRedis($redis_name);
		if($redis_ins == NULL || $redis_ins === false){
			return false;
		}
		return $redis_ins->exists($key); 
	}

	public function hset($key,$field,$value, $expire_time = 0,$redis_name = "online"){
		$redis_ins = self::getRedis($redis_name);
		if( $redis_ins == NULL || $redis_ins === false) {
			return false;
		}
		if($expire_time > 0 ) {
			return $redis_ins->hset($key,$field,$value);
		} else {
			return $redis_ins->hset($key,$field,$value);
		}
	}

	public function hget($key,$field,$redis_name = "online"){
		$redis_ins = self::getRedis($redis_name);
		if( $redis_ins == NULL || $redis_ins === false) {

			return false;
		}
		return $redis_ins->hget($key,$field);
	}

	public function hgetall($key,$redis_name = "online"){
		$redis_ins = self::getRedis($redis_name);
		if( $redis_ins == NULL || $redis_ins === false) {

			return false;
		}
		return $redis_ins->hgetall($key);
	}


	public function ttl($key, $redis_name = "online"){
		$redis_ins = self::getRedis($redis_name);
		if( $redis_ins == NULL || $redis_ins === false) {
			return false;
		}
		return $redis_ins->ttl($key);
	}

	public static function closeAllConns(){
		if(count(\bg\RedisExt::$_client) === 0){
			return true;
		}
		foreach (self::$_client as $conn) {
			$conn->close();
		}
	}


}