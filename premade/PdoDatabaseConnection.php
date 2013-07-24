<?php

namespace premade;

class PdoDatabaseConnection{
	protected $_connection;
	protected static $_instance;

	public function __construct(
		$driver,
		$host,
		$dbname,
		$username,
		$password
	){

		$this->_connection=new \PDO($driver.':host='.$host.
			';dbname='.$dbname,
			$username,
			$password
		);
	}

	public function getConnection(){
		return $this->_connection;
	}

	public static function getInstance(
		$driver=\premade\Constants::PDO_DATABASE_CONNECTION_DRIVER,
		$host=\premade\Constants::PDO_DATABASE_CONNECTION_HOST,
		$dbname=\premade\Constants::PDO_DATABASE_CONNECTION_DBNAME,
		$username=\premade\Constants::PDO_DATABASE_CONNECTION_USERNAME,
		$password=\premade\Constants::PDO_DATABASE_CONNECTION_PASSWORD
	){
		if(!self::$_instance){
			self::$_instance=new \premade\PdoDatabaseConnection(
				$driver,
				$host,
				$dbname,
				$username,
				$password
			);
		}

		return self::$_instance;
	}
}
