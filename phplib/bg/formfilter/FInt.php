<?php

namespace bg\formfilter;

class FInt extends \bg\formfilter\FAbstract{
	public function customVaild($result_raw,  $param){
		$vaild_data = intval($result_raw);
		$args = $param['args'];
		if( $vaild_data > intval($args['max']) || $vaild_data < intval($args['min']) ){
			return false;
		}else {
			return $vaild_data;
		}
	}
}
