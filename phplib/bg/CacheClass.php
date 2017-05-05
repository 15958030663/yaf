<?php

namespace bg;


class CacheClass{

    /**
     * @param $method  方法名称  __METHOD__
     * @param $tag     tag标签    和$method共同拼接成redis键名
     * @param \Closure $func   传入的闭包函数
     * @param int $timeCache   过期时间
     * @return array|mixed
     */
    public static function cacheDataByRedis($method, $tag, \Closure $func, $timeCache = 300){
		
		if(empty($method) || empty($tag)){
			return $func();
		}
		$method = str_replace('\\', '_', $method);
		$method = str_replace('::', '@', $method);
		
		$now = time();
		$timeCache = intval($timeCache) > 0 ? $timeCache : 0;
		$rKey = "BGCache:" . $method . ":" . $tag;
		if($timeCache > 0){
			$json_str = \bg\RedisExt::get($rKey);
			$json = !empty($json_str) ? json_decode($json_str, true) : [];
			$json['_update_'] = isset($json['_update_']) ? $json['_update_'] : 0;
			$data = isset($json['data']) ? $json['data'] : [];
		}

		//缓存时间不允许超过timeCache
		if($timeCache == 0 || !isset($json['data']) || $now - $json['_update_'] > $timeCache){
			$data = $func();
			$timeCache = $timeCache <= 0 ? 300 : $timeCache;
			\bg\RedisExt::set($rKey, json_encode(['data' => $data, '_update_' => $now]), $timeCache);
		}

		return $data;

	} 

}