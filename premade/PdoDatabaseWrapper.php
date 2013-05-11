<?php

namespace premade;

class PdoDatabaseWrapper{
	protected $_databaseConnection;

	public function __construct($databaseConnection){
		$this->_databaseConnection=$databaseConnection;
	}

	public function execute($sql){
		try{
			$statement=$this->_databaseConnection->getConnection()->prepare($sql);

			$statement->execute();

			return $statement;
		}catch(PDOException $ex){
			return NULL;
		}
	}

	public function fetch($statement){
		try{
			return $statement->fetch();
		}catch(PDOException $ex){
			return NULL;
		}
	}
}
