<?php

namespace application\models;

class PostVo{
	protected $_id;
	protected $_name;
	protected $_title;
	protected $_body;
	protected $_createdAt;
	protected $_modifiedAt;

	public function __construct(
		$id=NULL,
		$name='',
		$title='',
		$body='',
		$createdAt=NULL,
		$modifiedAt=NULL
	){
		$this->_id=$id;
		$this->_name=$name;
		$this->_title=$title;
		$this->_body=$body;
		$this->_createdAt=$createdAt;
		$this->_modifiedAt=$modifiedAt;
	}

	public function set(
		$id=NULL,
		$name='',
		$title='',
		$body='',
		$createdAt=NULL,
		$modifiedAt=NULL
	){
		$this->_id=$id;
		$this->_name=$name;
		$this->_title=$title;
		$this->_body=$body;
		$this->_createdAt=$createdAt;
		$this->_modifiedAt=$modifiedAt;
	}

	public function setId($id){
		$this->_id=$id;
	}

	public function getId(){
		return $this->_id;
	}

	public function setName($name){
		$this->_name=$name;
	}

	public function getName(){
		return $this->_name;
	}

	public function setTitle($title){
		$this->_title=$title;
	}

	public function getTitle(){
		return $this->_title;
	}

	public function setBody($body){
		$this->_body=$body;
	}

	public function getBody(){
		return $this->_body;
	}

	public function setCreatedAt($createdAt){
		$this->_createdAt=$createdAt;
	}

	public function getCreatedAt(){
		return $this->_createdAt;
	}

	public function setModifiedAt($modifiedAt){
		$this->_modifiedAt=$modifiedAt;
	}

	public function getModifiedAt(){
		return $this->_modifiedAt;
	}
}
