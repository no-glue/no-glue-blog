<?php

namespace application\models;

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
		$this->_username=$statement['id'];
		$this->_password=$statement['id'];
		$this->_level=$statement['id'];
		$this->_created_at=$statement['created_at'];
		$this->_modified_at=$statement['modified_at'];
	
		return $this;
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
