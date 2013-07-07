<?php

namespace premade;

require_once('Constants.php');

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
		$driver=\premade\PdoDatabaseConnectionConstants::DRIVER,
		$host=\premade\PdoDatabaseConnectionConstants::HOST,
		$dbname=\premade\PdoDatabaseConnectionConstants::DBNAME,
		$username=\premade\PdoDatabaseConnectionConstants::USERNAME,
		$password=\premade\PdoDatabaseConnectionConstants::PASSWORD
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
