<?php

class IndexController extends Yaf\Controller_Abstract{

	public $actions = [
		'index'   => 'modules/Mis/actions/index/Index.php',
        'script'  => 'modules/Mis/actions/index/Script.php',
	];

}