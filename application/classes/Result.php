<?php

namespace application\classes;

class Result{
	protected $_databaseWrapper;
	protected $_statement;
	protected $_whatVo;

	public function __construct($databaseWrapper=NULL,$statement=NULL,$whatVo=''){
		$this->_databaseWrapper=$databaseWrapper;
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
	}

	public function setWhatVo($whatVo){
		$this->_whatVo=$whatVo;
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
		require_once('application/models/VoFactory.php');

		$vo=\application\Models\VoFactory::create($this->_whatVo);

		$vo->set($this->_databaseWrapper->fetch($this->_statement));

		return $vo;
	}
}
