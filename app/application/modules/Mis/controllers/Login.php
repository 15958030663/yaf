<?php

class LoginController extends Yaf\Controller_Abstract{

	public $actions = [
	
		'show'   => 'modules/Mis/actions/login/Show.php',
		'signin' => 'modules/Mis/actions/login/Signin.php',
		'signout' => 'modules/Mis/actions/login/Signout.php',

		'addcate' => 'modules/Mis/actions/login/Addcate.php',
		'runaddcate' => 'modules/Mis/actions/login/Runaddcate.php',
		'listcate' => 'modules/Mis/actions/login/Listcate.php',


		'addblog' => 'modules/Mis/actions/login/Addblog.php',
		'runaddblog' => 'modules/Mis/actions/login/Runaddblog.php',
	];
	
}