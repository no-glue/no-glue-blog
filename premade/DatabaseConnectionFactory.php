<?php

namespace premade;

require_once('PdoDatabaseConnection.php');

class DatabaseConnectionFactory{
	public static function create($object='\premade\PdoDatabaseConnection'){
		$databaseSettings=require_once('configure/pdoDatabase.php');

		return $object::getInstance(
			$databaseSettings['type'],
			$databaseSettings['host'],
			$databaseSettings['database'],
			$databaseSettings['user'],
			$databaseSettings['password']
		);
	}
}
