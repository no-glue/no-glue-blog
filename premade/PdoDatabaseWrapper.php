<?php

namespace premade;

class PdoDatabaseWrapper{
	protected $_databaseConnection;

	public function __construct(
		$databaseConnection=array(
			'factory_file'=>'PremadeFactory.php',
			'factory'=>'\\premade\\PremadeFactory',
			'object'=>'PdoDatabaseConnection'
		)
	){
		$this->_databaseConnection=
			$databaseConnection['factory']::create(
				$databaseConnection['object']
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
