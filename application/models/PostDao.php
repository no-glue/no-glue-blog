<?php

namespace application\models;

use premade;
use application\classes;

class PostDao{
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

	public function set($databaseWrapper){
		$this->_databaseWrapper=$databaseWrapper;
	}

	public function execute($sql){
		$statement=$this->_databaseWrapper->execute($sql);

		return $statement;
	}
	
	public function getPosts($sql='SELECT * FROM posts ORDER BY id DESC'){
		return $this->execute($sql);
	}

	public function getPostById($postId,$sql='SELECT * FROM posts WHERE id=%d'){
		
		return $this->execute(sprintf($sql,$postId));
	}

	public function save($postVo,$sql='INSERT INTO posts (name,title,body,created_at,modified_at) VALUES (:name,:title,:body,:created_at,:modified_at)'){
		$statement=$this->_databaseWrapper->execute($sql,array(
			':name'=>$postVo->getName(),
			':title'=>$postVo->getTitle(),
			':body'=>$postVo->getBody(),
			':created_at'=>$postVo->getCreatedAt(),
			':modified_at'=>$postVo->getModifiedAt()
		));

		return $statement->rowCount();
	}

	public function deletePostById($postId,$sql='DELETE FROM posts WHERE id=:id'){
		$statement=$this->_databaseWrapper->execute($sql,array(':id'=>$postId));

		return $statement->rowCount();
	}

	public function update($postVo,$sql='UPDATE posts SET name=:name,title=:title,body=:body,modified_at=UNIX_TIMESTAMP() WHERE id=:id'){
		$statement=$this->_databaseWrapper->execute($sql,array(
			':name'=>$postVo->getName(),
			':title'=>$postVo->getTitle(),
			':body'=>$postVo->getBody(),
			':id'=>$postVo->getId()
		));

		return $statement->rowCount();
	}
}
