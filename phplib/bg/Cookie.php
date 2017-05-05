<?php

namespace bg;

class Cookie{


	public static function redirect($url){
		header('Location:' . $url);
	}

}