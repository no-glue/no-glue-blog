<?php

namespace application\models;

require_once('premade/DatabaseConnectionFactory.php');
require_once('PostVo.php');

use premade;

class PostDao{
	protected $_databaseConnection;

	public function __construct($databaseConnection){
		$this->_databaseConnection=$databaseConnection;
	}

	public function execute($sql){
		try{
			$rowNumber=0;

			foreach($this->_databaseConnection->getConnection()->query($sql) as $row){
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

		} catch(PDOException $ex) {
			return NULL;
		}
	}
	
	public function getPosts(){
		$sql='SELECT * FROM posts';

		return $this->execute($sql);
	}

	public function validateAndSave($postVo){
		$validationRules=$postVo->getValidationRules();
		$result=TRUE;

		foreach($validationRules as $field=>$rules){
			foreach($rules as $rule){
				$result&=$rule($postVo->getValue($field));
			}
		}

		if(!$result){
			return NULL;
		}

		$sql='INSERT INTO posts (name,title,body,created,modified) VALUES (\''.$postVo->getName().'\',\''.$postVo->getTitle().'\',\''.$postVo->getBody().'\','.postVo->getCreated().','.$postVo->getModified().')';
		
		try{
			$this->_databaseConnection->getConnection()->query($sql);
			
			return $this->_databaseConnection->getConnection()->rowCount();
		} catch(PDOException $ex) {
			return NULL;
		}
	}
}
