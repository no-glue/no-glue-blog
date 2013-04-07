<?php

namespace premade;

class PdoDatabaseConnection{
	protected $_connection;
	protected static $_instance;

	public function __construct($driver,$host,$dbname,$username,$password){

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
		$driver,
		$host,
		$dbname,
		$username,
		$password){
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
