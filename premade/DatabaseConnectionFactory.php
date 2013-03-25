<?php

namespace premade;

require_once('PdoDatabaseConnection.php');

class DatabaseConnectionFactory{
	public static function create($object='\premade\PdoDatabaseConnection'){
		return $object::getInstance(
			'mysql',
			'localhost',
			'noglue',
			'root',
			'srbijA123'
		);
	}
}
