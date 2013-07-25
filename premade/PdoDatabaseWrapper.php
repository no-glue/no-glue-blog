<?php

namespace premade;

class PdoDatabaseWrapper{
	protected $_databaseConnection;

	public function __construct(
		$databaseConnection='PdoDatabaseConnection',
		$factory=\premade\Constants::FACTORY
	){
		$this->_databaseConnection=$factory::create(
			$databaseConnection
		);
	}

	public function execute($sql,$params=array()){
		try{
			$statement=$this->_databaseConnection->getConnection()->prepare($sql,array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_FWDONLY));

			$statement->execute($params);

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
