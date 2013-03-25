<?php

namespace application;

require_once('PostVo.php');

class PostDao{
	protected $_postVo;

	public function __construct($postVo){
		$this->_postVo=$postVo;
	}
}
