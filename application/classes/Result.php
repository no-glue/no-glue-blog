<?php

namespace application\classes;

class Result{
	protected $_databaseWrapper;
	protected $_statement;
	protected $_whatVo;
	protected $_voSetter;

	public function __construct($databaseWrapper=NULL,$statement=NULL,$whatVo='',$voSetter=''){
		$this->_databaseWrapper=$databaseWrapper;
		$this->_statement=$statement;
		$this->_whatVo=$whatVo;
		$this->_voSetter=$_voSetter;
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
	}

	public function setWhatVo($whatVo){
		$this->_whatVo=$whatVo;
	}

	public function setVoSetter($voSetter){
		$this->_voSetter=$voSetter;
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
		require_once('application/models/VoSetterFactory.php');

		$vo=NULL;

		$statement=$this->_databaseWrapper->fetch($this->_statement);

		$voSetter=\application\models\VoSetterFactory::create($this->_voSetter);

		$statement AND 
		$vo=\application\Models\VoFactory::create($this->_whatVo) AND 
		$voSetter->set($vo,$statement);

		return $vo;
	}
}
