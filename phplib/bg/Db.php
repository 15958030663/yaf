<?php

namespace bg;

class Db{
	private static $_client;

	private static function init($db_name){
		if(!isset($_client[$db_name])){
			if( !isset(\conf\Db::$db[$db_name]) ){
				return false;
			}

			$db_conf = \conf\Db::$db[$db_name];
			if( !isset(\bg\Db::$_client[$db_name]) ) {
				\bg\Db::$_client[$db_name] = new \ut\DB();
				\bg\Db::$_client[$db_name] -> connect($db_conf);
			}
		}
	}

	public static function getDb($db_name){
		$ret = self::init($db_name);
		if($ret === false) {
			return false;
		}
		return \bg\Db::$_client[$db_name];	
	}
}