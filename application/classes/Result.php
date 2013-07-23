<?php

namespace application\classes;

use premade;

class Result{
	protected $_databaseWrapper;
	protected $_statement;
	protected $_whatVo;

	public function __construct($databaseWrapper=array(
		'factory_file'=>'premade/Factory.php',
		'factory'=>'\\premade\\Factory',
		'object'=>'PdoDatabaseWrapper'),
		$statement=NULL,$whatVo=''){
		require_once($databaseWrapper['factory_file']);

		$this->_databaseWrapper=
			$databaseWrapper['factory']::create(
				$databaseWrapper['object']
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
		require_once('application/models/ModelFactory.php');

		$vo=NULL;

		$statement=$this->_databaseWrapper->fetch($this->_statement);

		$statement AND 
		$vo=\application\Models\ModelFactory::create($this->_whatVo) AND 
		$vo->setFromArray($statement);

		return $vo;
	}
}
