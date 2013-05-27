<?php

namespace application\models;

use premade;
use application\classes;

class UserDao{
	protected $_databaseWrapper;

	public function __construct($databaseWrapper=array(
		'factory_file'=>'premade/DatabaseWrapperFactory.php',
		'factory'=>'\\premade\\DatabaseWrapperFactory',
		'object'=>'\\premade\\PdoDatabaseWrapper'
	)){
		require_once($databaseWrapper['factory_file']);

		$this->_databaseWrapper=
			$databaseWrapper['factory']::create(
				$databaseWrapper['object']
			);
	}

	public function login($username,$password,$sql='SELECT id FROM users WHERE username=:username AND password=:password'){
		$statement=$this->_databaseWrapper->execute($sql,array(
			':username'=>$username,
			':password'=>$password
		));

		return $statement->rowCount();
	}
}
