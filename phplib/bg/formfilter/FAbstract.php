<?php

namespace bg\formfilter;

class  FAbstract{
	
	/*
	 * 校验参数
	 */
	public function vaild($result_raw,  $param){
		//各个类自定义的校验
		$ret = $this->customVaild($result_raw,  $param);
		return $ret;
	}
}