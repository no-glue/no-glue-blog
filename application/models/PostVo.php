<?php

namespace application;

class PostVo{
	protected $_id;
	protected $_name;
	protected $_title;
	protected $_body;
	protected $_created;
	protected $_modified;

	public function setId($id){
		$this->_id=$id;
	}

	public function getId($id){
		return $this->_id;
	}
}
