<?php

namespace premade;

class PdoDatabaseConnection{
	protected $_connection;
	protected static $_instance;

	public function __construct($driver,$host,$dbname,$charset,$username,$password){
		$this->_connection($driver.':host='.$host.';dbname='.$dbname.';charset='.$charset,$username,$password);
	}

	public function getConnection(){
		return $this->_connection;
	}

	public static function getInstance($driver,$host,$dbname,$charset,$username,$password){
		if(!self::$_instance){
			self::$_instance=new PdoDatabaseConnection($driver,$host,$dbname,$charset,$username,$password);
		}

		return self::$_instance;
	}
}
