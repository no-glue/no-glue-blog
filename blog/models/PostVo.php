<?php

namespace blog\models;

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

	public function setFromArray($statement){
		$this->_id=$statement['id'];
		$this->_name=$statement['name'];
		$this->_title=$statement['title'];
		$this->_body=$statement['body'];
		$this->_createdAt=$statement['created_at'];
		$this->_modifiedAt=
			isset($statement['modified_at'])?
				$statement['modified_at']:time();
	}

	public function setFromObject($object){
		$this->_id=
			isset($object->id)?
				$object->id:'';
		$this->_name=$object->name;
		$this->_title=$object->title;
		$this->_body=$object->body;
		$this->_createdAt=
			isset($object->created_at)?
				$object->created_at:time();
		$this->_modifiedAt=
			isset($object->modified_at)?
				$object->modified_at:time();

		return $this;
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
