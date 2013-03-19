<?php

namespace premade;

require_once('Index.php');

class IndexFactory{
	public static function create($object='\premade\Index'){
		return new $object(
			function(){
				return require_once('configure/routes.php');
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
