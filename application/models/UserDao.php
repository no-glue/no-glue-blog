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

	public function execute($sql){
		$statement=$this->_databaseWrapper->execute($sql);

		return $statement;
	}

	public function getUsers($sql='SELECT * FROM users ORDER BY id DESC'){
		return $this->execute($sql);
	}

	public function getUserById($userId,$sql='SELECT * FROM users WHERE id=%d'){
		
		return $this->execute(sprintf($sql,$userId));
	}

	public function save($userVo,$sql='INSERT INTO users (username,password,level,created_at,modified_at) VALUES (:username,:password,:level,:created_at,:modified_at)'){
		$statement=$this->_databaseWrapper->execute($sql,array(
			':username'=>$userVo->getUsername(),
			':password'=>$userVo->getPassword(),
			':level'=>$userVo->getLevel(),
			':created_at'=>$userVo->getCreatedAt(),
			':modified_at'=>$userVo->getModifiedAt()
		));

		return $statement->rowCount();
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

	public function logout(){
		require_once('application/classes/ClassFactory.php');

		return \application\classes\ClassFactory::create('Session')
			->logout($row['level']);
	}

	public function update($userVo,$sql='UPDATE users SET username=:username,<password=:password,>level=:level,modified_at=UNIX_TIMESTAMP() WHERE id=:id'){
		$values=array(
			':username'=>$userVo->getUsername(),
			':password'=>$userVo->getPassword(),
			':level'=>$userVo->getLevel(),
			':id'=>$userVo->getId()
		);
			
		if($userVo->getPassword()!==''){
			$sql=str_replace('<password=:password,>','password=:password,',$sql);
		}else{
			$sql=str_replace('<password=:password,>','',$sql);
			unset($values[':password']);
		}

		$statement=$this->_databaseWrapper->execute($sql,$values);

		return $statement->rowCount();
	}
}
