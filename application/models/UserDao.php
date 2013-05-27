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

	public function login($username,$password,$sql='SELECT id,level FROM users WHERE username=:username AND password=:password'){
		require_once('application/classes/ClassFactory.php');

		$statement=$this->_databaseWrapper->execute($sql,array(
			':username'=>$username,
			':password'=>$password
		));

		$row=$this->_databaseWrapper->fetch($statement);

		$session=\application\classes\ClassFactory::create('Session');

		$session->login($row['level']);

		return $statement->rowCount();
	}
}
