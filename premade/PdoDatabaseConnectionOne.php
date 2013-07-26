<?php

namespace premade;

class PdoDatabaseConnectionOne{
	protected $_connection;

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
}
