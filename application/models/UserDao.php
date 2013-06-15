<?php

namespace application\models;

use premade;
use application\classes;

class UserDao{
	protected $_databaseWrapper;
	protected $_scramble;
	protected $_userStatement;

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
			),
		$userStatement=array(
			'object'=>'UserStatement',
			'factory_file'=>'ModelFactory.php',
			'factory'=>'\\application\\models\\ModelFactory'
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

		require_once($userStatement['factory_file']);

		$this->_userStatement=
			$userStatement['factory']::create($userStatement['object']);
	}

	public function execute($sql,$values=array()){
		$statement=$this->_databaseWrapper->execute($sql,$values);

		return $statement;
	}

	public function getUsers(){
		return $this->execute($this->_userStatement->getUsers());
	}

	public function getUserById($userId){
		
		return $this->execute(sprintf(
			$this->_userStatement->getUserById(),$userId));
	}

	public function login($username,$password){
		require_once('application/classes/ClassFactory.php');

		$statement=$this->execute($this->_userStatement->login(),array(
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

	public function save($userVo){
		$statement=$this->execute($this->_userStatement->save(),array(
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

	public function deleteUserById($userId){
		$statement=$this->execute(
			$this->_userStatement->deleteUserById(),
			array(':id'=>$userId));

		return $statement->rowCount();
	}

	public function update($userVo){
		$values=array(
			':username'=>$userVo->getUsername(),
			':password'=>$this->_scramble->scramble(
				$userVo->getUsername(),
				$userVo->getPassword()),
			':level'=>$userVo->getLevel(),
			':id'=>$userVo->getId()
		);

		$sql=$this->_userStatement->update($userVo);
			
		if($userVo->getPassword()===''){
			unset($values[':password']);
		}

		$statement=$this->execute($sql,$values);

		return $statement->rowCount();
	}
}
