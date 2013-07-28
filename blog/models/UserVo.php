<?php

namespace blog\models;

class UserVo{
	protected $_id;
	protected $_username;
	protected $_password;
	protected $_level;
	protected $_created_at;
	protected $_modified_at;

	public function __construct(
		$id=NULL,
		$username='',
		$password='',
		$level=NULL,
		$created_at=NULL,
		$modified_at=NULL
	){
		$this->_id=$id;
		$this->_username=$username;
		$this->_password=$password;
		$this->_level=$level;
		$this->_created_at=$created_at;
		$this->_modified_at=$modified_at;
	}

	public function set(
		$id=NULL,
		$username='',
		$password='',
		$level=NULL,
		$created_at=NULL,
		$modified_at=NULL
	){
		$this->_id=$id;
		$this->_username=$username;
		$this->_password=$password;
		$this->_level=$level;
		$this->_created_at=$created_at;
		$this->_modified_at=$modified_at;

		return $this;
	}

	public function setFromArray($statement){
		$this->_id=$statement['id'];
		$this->_username=$statement['username'];
		$this->_password=$statement['password'];
		$this->_level=$statement['level'];
		$this->_created_at=$statement['created_at'];
		$this->_modified_at=$statement['modified_at'];
	
		return $this;
	}

	public function setFromObject($object){
		$this->_id=
			isset($object->id)?
				$object->id:'';
		$this->_username=$object->username;
		$this->_password=
			isset($object->password)?
				$object->password:'';
		$this->_level=$object->level;
		$this->_created_at=
			isset($object->created_at)?
				$object->created_at:time();
		$this->_modified_at=
			isset($object->modified_at)?
				$object->modified_at:time();

		return $this;
	}

	public function setId($id){
		$this->_id=$id;

		return $this;
	}

	public function getId(){
		return $this->_id;
	}

	public function setUsername($username){
		$this->_username=$username;

		return $this;
	}

	public function getUsername(){
		return $this->_username;
	}

	public function setPassword($password){
		$this->_password=$password;

		return $this;
	}

	public function getPassword(){
		return $this->_password;
	}

	public function setLevel($level){
		$this->_level=$level;

		return $this;
	}

	public function getLevel(){
		return $this->_level;
	}

	public function setCreatedAt($created_at){
		$this->_created_at=$created_at;

		return $this;
	}

	public function getCreatedAt(){
		return $this->_created_at;
	}

	public function setModifiedAt($modified_at){
		$this->_modified_at=$modified_at;

		return $this;
	}

	public function getModifiedAt(){
		return $this->_modified_at;
	}
}
