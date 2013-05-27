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
}
