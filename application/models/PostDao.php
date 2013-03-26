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

		} catch(PDOException $ex){
			return NULL;
		}
	}
			
}
