<?php

namespace bg\formfilter;

class FDouble extends \bg\formfilter\FAbstract{
	public function customVaild($result_raw,  $param){
		$vaild_data = doubleval($result_raw);
		$args = $param['args'];
		if( $vaild_data > doubleval($args['max']) || $vaild_data < doubleval($args['min']) ){
			return false;
		}else {
			return $vaild_data;
		}
	}
}
