<?php

class Bootstrap extends Yaf\Bootstrap_Abstract{
	
	public function _initRouter(){
		//获取请求实例uri
		$uri = Yaf\Dispatcher::getInstance()->getRequest()->getRequestUri();
		$uri_list = explode("/", $uri);
		array_shift($uri_list);


		$module = trim($uri_list[0]);
		if(empty($module)){
			$module = \conf\Router::DEFAULT_MODULE;
			$uri_list[0] = "/";
		}


		$new_uri = [
			'module' => $module,
		];

		if(count($uri_list) == 1){
			$new_uri['action'] = \conf\Router::DEFAULT_ACTION;
		}
		
		if(count($uri_list) == 2){
			$new_uri['action'] = $uri_list[1];
		}

		if( count($uri_list) == 3) {
			$new_uri['controller'] = $uri_list[1];
			$new_uri['action'] = $uri_list[2];
		}
		//获取路由器
		$router = Yaf\Dispatcher::getInstance()->getRouter();
		//重写路由规则
		$route = new Yaf\Route\Rewrite( $uri_list[0] , $new_uri);
		//添加路由
		$router->addRoute($uri_list[0], $route);
	}

}