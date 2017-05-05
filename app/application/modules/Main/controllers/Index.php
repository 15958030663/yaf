<?php

class IndexController extends Yaf\Controller_Abstract{

	public $actions = [
		'index'   => 'modules/Main/actions/index/Index.php',
		'article'   => 'modules/Main/actions/index/Article.php',
	];

}