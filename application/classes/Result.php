<?php

namespace application\classes;

class Result{
	protected $_databaseWrapper;
	protected $_statement;
	protected $_whatVo;

	public function __construct($databaseWrapper,$statement,$whatVo){
		$this->_databaseWrapper=$databaseWrapper;
		$this->_statement=$statement;
		$this->_whatVo=$whatVo;
	}

	public function set($databaseWrapper,$statement,$whatVo){
		$this->_databaseWrapper=$databaseWrapper;
		$this->_statement=$statement;
		$this->_whatVo=$whatVo;
	}

	public function fetch(){
		require_once('application/models/VoFactory.php');

		$vo=\application\Models\VoFactory::create($this->_whatVo);

		$vo->set($this->_databaseWrapper->fetch($this->_statement));

		return $vo;
	}
}
