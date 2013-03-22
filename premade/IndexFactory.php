<?php

namespace premade;

require_once('Index.php');

class IndexFactory{
	public static function create($object='\premade\Index'){
		return new $object(
			function(){
				$routes=require_once('configure/routes.php');

				$routes['class']=$routes['class']();
				$routes['action']=$routes['action']();
				$routes['params']=$routes['params']();
				var_dump($routes['params']);

				return $routes;
			},
			function(){
				require_once('IndexRoutesObserverFactory.php');

				return array(
					'index_routes_observer'=>\premade\IndexRoutesObserverFactory::create()
				);
			}
			);
	}
}
