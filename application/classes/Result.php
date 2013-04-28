<?php

namespace application\classes;

class Result{
	protected $_databaseWrapper;
	protected $_statement;

	public function __construct($databaseWrapper,$statement){
		$this->_databaseWrapper=$databaseWrapper;
		$this->_statement=$statement;
	}

	public function fetch($thisVo){
		require_once('application/models/VoFactory.php');

		$vo=\application\Models\VoFactory::create($thisVo);

		$vo->set($this->_databaseWrapper->fetch($this->_statement));

		return $vo;
	}
}
