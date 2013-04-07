<?php

namespace premade;

require_once('PdoDatabaseWrapper.php');
require_once('DatabaseConnectionFactory.php');

class DatabaseWrapperFactory{
	public static function create($object='\premade\PdoDatabaseWrapper'){
		return new $object(\premade\DatabaseConnectionFactory::create());
	}
}
