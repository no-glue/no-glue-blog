<?php

namespace blog\models;

class UserDao{
	protected $_databaseWrapper;
	protected $_scramble;
	protected $_session;
	protected $_userStatement;

	public function __construct(
		$databaseWrapper='PdoDatabaseWrapper',
		$scramble='Scramble',
		$session='Session',
		$userStatement='UserStatement',
		$premadeFactory='\\premade\\Factory',
		$usefulFactory='\\useful\\Factory',
		$modelsFactory='\\blog\\models\\Factory'
	){
		$this->_databaseWrapper=$premadeFactory::create(
			$databaseWrapper
		);

		$this->_scramble=$usefulFactory::create($scramble);

		$this->_session=$usefulFactory::create($session);

		$this->_userStatement=$modelsFactory::create($userStatement);
	}

	public function setSession($session){
		$this->_session=$session;
	}

	public function getSession(){
		return $this->_session;
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
		$statement=$this->execute($this->_userStatement->login(),array(
			':username'=>$username,
			':password'=>$this->_scramble
				->scramble($username,$password)
		));

		$row=$this->_databaseWrapper->fetch($statement);

		$this->_session->login($row['level']);

		return $statement->rowCount();
	}

	public function logout(){
		return $this->_session->logout($row['level']);
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
