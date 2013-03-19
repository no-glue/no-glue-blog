<?php

namespace premade;

require_once('IndexRoutesObserver.php');

class IndexRoutesObserverFactory{
	public static function create($object='\premade\IndexRoutesObserver'){
		return new $object;
	}
}
