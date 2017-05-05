<?php

class ShowAction extends bg\BaseAction{

	public function init(){
		$this->tpl_file = "mis/page/login.html";
	}
	
	public function invoke(){
    	return true;
   	}
}
