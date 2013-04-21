<?php

namespace application\models;

require_once('PostVo.php');

class PostDao{
	protected $_databaseWrapper;

	public function __construct($databaseWrapper){
		$this->_databaseWrapper=$databaseWrapper;
	}

	public function execute($sql){
		$rowNumber=0;
		$statement=$this->_databaseWrapper->execute($sql);

		while($row=$this->_databaseWrapper->fetch($statement)){
			$postVo[$rowNumber]=new \application\models\postVo();

			$postVo[$rowNumber]->setId($row['id']);
			$postVo[$rowNumber]->setName($row['name']);
			$postVo[$rowNumber]->setTitle($row['title']);
			$postVo[$rowNumber]->setBody($row['body']);
			$postVo[$rowNumber]->setCreated($row['created']);
			$postVo[$rowNumber]->setModified($row['modified']);
			$rowNumber++;
		}

		return $postVo;
	}
	
	public function getPosts(){
		$sql='SELECT * FROM posts';

		return $this->execute($sql);
	}

	public function save($postVo){
		$sql='INSERT INTO posts (name,title,body,created,modified) VALUES (\''.$postVo->getName().'\',\''.$postVo->getTitle().'\',\''.$postVo->getBody().'\','.$postVo->getCreated().','.$postVo->getModified().')';

		$statement=$this->_databaseWrapper->execute($sql);

		return $statement->rowCount();
	}
}
