<?php

namespace bg\formfilter;


class FString extends \bg\formfilter\FAbstract{
	public function customVaild($result_raw,  $param){
		$vaild_data = trim($result_raw);
		
		$args = $param['args'];
		if( strlen($vaild_data) > intval($args['max']) || strlen($vaild_data) < intval($args['min']) ){
			return false;
		}else {
			return $vaild_data;
		}
	}
}
