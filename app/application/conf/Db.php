<?php

namespace conf;

class Db{
	public static $db = [
		'app' => [
			'server' => '127.0.0.1',
			'port' => 3306,
			'user' => 'root',
			'password' => '',
			'timeout' => 2000,
			'db_name' => 'dog',
		],
	];



	public static $redis = [
		'online' => [
			'ip' => '127.0.0.1',
			'port' => 6379,
		],
	];
}