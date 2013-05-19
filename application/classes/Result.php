<?php

namespace application\classes;

use premade;

class Result{
	protected $_databaseWrapper;
	protected $_statement;
	protected $_whatVo;
	protected $_voSetter;

	public function __construct($databaseWrapper=array(
		'factory_file'=>'premade/DatabaseWrapperFactory.php',
		'factory'=>'\\premade\\DatabaseWrapperFactory',
		'object'=>'\\premade\\PdoDatabaseWrapper'),
		$statement=NULL,$whatVo='',$voSetter=''){
		require_once($databaseWrapper['factory_file']);

		$this->_databaseWrapper=
			$databaseWrapper['factory']::create(
				$databaseWrapper['object']
			);

		$this->_statement=$statement;
		$this->_whatVo=$whatVo;
		$this->_voSetter=$voSetter;
	}

	public function set($databaseWrapper,$statement,$whatVo,$voSetter){
		$this->_databaseWrapper=$databaseWrapper;
		$this->_statement=$statement;
		$this->_whatVo=$whatVo;
		$this->_voSetter=$voSetter;
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

	public function setVoSetter($voSetter){
		$this->_voSetter=$voSetter;

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

	public function getVoSetter(){
		return $this->_voSetter;
	}

	public function fetch(){
		require_once('application/models/VoFactory.php');

		$vo=NULL;

		$statement=$this->_databaseWrapper->fetch($this->_statement);

		$statement AND 
		$vo=\application\Models\VoFactory::create($this->_whatVo) AND 
		$vo->setFromArray($statement);

		return $vo;
	}
}
