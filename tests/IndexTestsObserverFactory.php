<?php

namespace tests;

require_once('IndexTestsObserver.php');

class IndexTestsObserverFactory{
	public static function create($object='\tests\IndexTestsObserver'){
		return new $object;
	}
}
