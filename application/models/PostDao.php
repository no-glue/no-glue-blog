<?php

namespace application\models;

require_once('PostVo.php');

class PostDao{
	protected $_databaseWrapper;

	public function __construct($databaseWrapper){
		$this->_databaseWrapper=$databaseWrapper;
	}

	public function execute($sql){
		try{
			$rowNumber=0;
			$statement=$this->_databaseWrapper->execute($sql);

			while($row=$statement->fetch()){
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

		}catch(Exception $ex){
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
			foreach($rules as $ruleName=>$ruleObject){
				$rule=$ruleObject->getValidationRules();
				$result&=$rule[$ruleName]($postVo->getValue($field));

				if(!$result){
					return NULL;
				}
			}
		}

		$sql='INSERT INTO posts (name,title,body,created,modified) VALUES (\''.$postVo->getName().'\',\''.$postVo->getTitle().'\',\''.$postVo->getBody().'\','.$postVo->getCreated().','.$postVo->getModified().')';

		try{
			$statement=$this->_databaseWrapper->execute($sql);

			return $statement->rowCount();
		}catch(Exception $ex){
			return NULL;
		}
	}
}
