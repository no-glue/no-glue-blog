<?php

namespace application\models;

use application\classes;

class PostDao{
	protected $_databaseWrapper;

	public function __construct($databaseWrapper=NULL){
		$this->_databaseWrapper=$databaseWrapper;
	}

	public function set($databaseWrapper){
		$this->_databaseWrapper=$databaseWrapper;
	}

	public function execute($sql){
		$statement=$this->_databaseWrapper->execute($sql);

		return $statement;
	}
	
	public function getPosts($sql='SELECT * FROM posts'){
		return $this->execute($sql);
	}

	public function save($postVo){
		$sql='INSERT INTO posts (name,title,body,created,modified) VALUES (\''.$postVo->getName().'\',\''.$postVo->getTitle().'\',\''.$postVo->getBody().'\','.$postVo->getCreated().','.$postVo->getModified().')';

		$statement=$this->_databaseWrapper->execute($sql);

		return $statement->rowCount();
	}
}
