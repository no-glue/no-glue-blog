<?php

namespace application\models;

use premade;
use application\classes;

class UserDao{
	protected $_databaseWrapper;
	protected $_scramble;

	public function __construct(
		$databaseWrapper=array(
			'factory_file'=>'premade/DatabaseWrapperFactory.php',
			'factory'=>'\\premade\\DatabaseWrapperFactory',
			'object'=>'\\premade\\PdoDatabaseWrapper'
		),
		$scramble=array(
			'object'=>'Scramble',
			'factory_file'=>'application/classes/ClassFactory.php',
			'factory'=>'\\application\\classes\\ClassFactory'
			)
	){
		require_once($databaseWrapper['factory_file']);

		$this->_databaseWrapper=
			$databaseWrapper['factory']::create(
				$databaseWrapper['object']
			);

		require_once($scramble['factory_file']);

		$this->_scramble=
			$scramble['factory']::create($scramble['object']);
	}

	public function execute($sql,$values=array()){
		$statement=$this->_databaseWrapper->execute($sql,$values);

		return $statement;
	}

	public function getUsers($sql='SELECT * FROM users ORDER BY id DESC'){
		return $this->execute($sql);
	}

	public function getUserById($userId,$sql='SELECT * FROM users WHERE id=%d'){
		
		return $this->execute(sprintf($sql,$userId));
	}

	public function login($username,$password,$sql='SELECT id,level FROM users WHERE username=:username AND password=:password'){
		require_once('application/classes/ClassFactory.php');

		$statement=$this->execute($sql,array(
			':username'=>$username,
			':password'=>$this->_scramble
				->scramble($username,$password)
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

	public function save(
		$userVo,
		$sql='INSERT INTO users (username,password,level,created_at,modified_at) VALUES (:username,:password,:level,:created_at,:modified_at)'
	){
		$statement=$this->execute($sql,array(
			':username'=>$userVo->getUsername(),
			':password'=>
				$this->_sramble->scramble(
					$userVo->getUsername(),
					$userVo->getPassword()),
			':level'=>$userVo->getLevel(),
			':created_at'=>$userVo->getCreatedAt(),
			':modified_at'=>$userVo->getModifiedAt()
		));

		return $statement->rowCount();
	}

	public function deleteUserById($userId,$sql='DELETE FROM users WHERE id=:id'){
		$statement=$this->execute($sql,array(':id'=>$userId));

		return $statement->rowCount();
	}

	public function update($userVo,$sql='UPDATE users SET username=:username,<password=:password,>level=:level,modified_at=UNIX_TIMESTAMP() WHERE id=:id'){
		$values=array(
			':username'=>$userVo->getUsername(),
			':password'=>$this->_scramble->scramble(
				$userVo->getUsername(),
				$userVo->getPassword()),
			':level'=>$userVo->getLevel(),
			':id'=>$userVo->getId()
		);
			
		if($userVo->getPassword()!==''){
			$sql=str_replace('<password=:password,>','password=:password,',$sql);
		}else{
			$sql=str_replace('<password=:password,>','',$sql);
			unset($values[':password']);
		}

		$statement=$this->execute($sql,$values);

		return $statement->rowCount();
	}
}
