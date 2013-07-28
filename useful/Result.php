<?php

namespace useful;

use premade;

class Result{
	protected $_databaseWrapper;
	protected $_statement;
	protected $_whatVo;

	public function __construct(
		$databaseWrapper='PdoDatabaseWrapper',
		$statement=NULL,
		$whatVo=''
	){
		require_once('premade/Factory.php');

		$this->_databaseWrapper=\premade\Factory::create(
			$databaseWrapper
		);

		$this->_statement=$statement;
		$this->_whatVo=$whatVo;
	}

	public function set($databaseWrapper,$statement,$whatVo){
		$this->_databaseWrapper=$databaseWrapper;
		$this->_statement=$statement;
		$this->_whatVo=$whatVo;
	}

	public function setDatabaseWrapper($databaseWrapper){
		$this->_databaseWrapper=$databaseWrapper;
	}

	public function setStatement($statement){
		$this->_statement=$statement;

		return $this;
	}

	public function setWhatVo($whatVo){
		$this->_whatVo=$whatVo;

		return $this;
	}

	public function getDatabaseWrapper(){
		return $this->_databaseWrapper;
	}

	public function getStatement(){
		return $this->_statement;
	}

	public function getWhatVo(){
		return $this->_whatVo;
	}

	public function fetch(){
		require_once('application/models/Factory.php');

		$vo=NULL;

		$statement=$this->_databaseWrapper->fetch($this->_statement);

		$statement AND 
		$vo=\application\Models\Factory::create($this->_whatVo) AND 
		$vo->setFromArray($statement);

		return $vo;
	}
}
