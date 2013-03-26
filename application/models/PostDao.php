<?php

namespace application\models;

require_once('premade/DatabaseConnectionFactory.php');
require_once('PostVo.php');

use premade;

class PostDao{
	protected $_databaseConnection;
	protected $_postVo;

	public function __construct($databaseConnection,$postVo){
		$this->_databaseConnection=$databaseConnection;
		$this->_postVo=$postVo;
	}
}
