<?php

namespace premade;

class PdoDatabaseWrapper{
	protected $_databaseConnection;

	public function __construct(
		$databaseConnection='PdoDatabaseConnection'
	){
		require_once('Factory.php');

		$this->_databaseConnection=
			\premade\Factory::create(
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
