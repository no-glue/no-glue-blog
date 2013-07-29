<?php

namespace blog\models;

class PostDao{
	protected $_databaseWrapper;
	protected $_postStatement;

	public function __construct(
		$databaseWrapper='PdoDatabaseWrapper',
		$postStatement='PostStatement',
		$premadeFactory='\\premade\\Factory',
		$modelsFactory='\\blog\\models\\Factory'
	){
		$this->_databaseWrapper=$premadeFactory::create(
			$databaseWrapper
		);

		$this->_postStatement=$modelsFactory::create(
			$postStatement
		);
	}

	public function set($databaseWrapper){
		$this->_databaseWrapper=$databaseWrapper;
	}

	public function execute($sql,$values=array()){
		$statement=$this->_databaseWrapper->execute($sql,$values);

		return $statement;
	}
	
	public function getPosts(){
		return $this->execute($this->_postStatement->getPosts());
	}

	public function getPostById($id){
		
		return $this->execute(
			$this->_postStatement->getPostById(),array(':id'=>$id));
	}

	public function save($postVo){
		$statement=$this->execute($this->_postStatement->save(),array(
			':name'=>$postVo->getName(),
			':title'=>$postVo->getTitle(),
			':body'=>$postVo->getBody(),
			':created_at'=>$postVo->getCreatedAt(),
			':modified_at'=>$postVo->getModifiedAt()
		));

		return $statement->rowCount();
	}

	public function deletePostById($postId){
		$statement=$this->execute(
			$this->_postStatement->deletePostById(),
			array(':id'=>$postId));

		return $statement->rowCount();
	}

	public function update($postVo){
		$statement=$this->execute($this->_postStatement->update(),array(
			':name'=>$postVo->getName(),
			':title'=>$postVo->getTitle(),
			':body'=>$postVo->getBody(),
			':id'=>$postVo->getId()
		));

		return $statement->rowCount();
	}
}
