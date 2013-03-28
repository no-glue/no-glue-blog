<?php

namespace application\models;

require_once('ValidationRulesRefinery.php');

class PostVo{
	protected $_id;
	protected $_name;
	protected $_title;
	protected $_body;
	protected $_created;
	protected $_modified;
	protected $_validationRules;

	public function __construct(
		$id=NULL,
		$name='',
		$title='',
		$body='',
		$created=NULL,
		$modified=NULL,
		$validationRules=array()
	){
		$this->_id=$id;
		$this->_name=$name;
		$this->_title=$title;
		$this->_body=$body;
		$this->_created=$created;
		$this->_modified=$modified;

		if(!empty($validationRules)){
			foreach($validationRules as $field=>$rules){
				foreach($rules as $rule){
					$this->_validationRules[$field][$rule]=\application\models\ValidationRulesRefinery::refine('\application\models\ValidationRules',$rule);
				}
			}
		} else {
			$this->_validationRules=array(
				'_name'=>array(
					'notempty'=>\application\models\ValidationRulesRefinery::refine('\application\models\ValidationRules','notempty')
			));
		}
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

	public function setCreated($created){
		$this->_created=$created;
	}

	public function getCreated(){
		return $this->_created;
	}

	public function setModified($modified){
		$this->_modified=$modified;
	}

	public function getModified(){
		return $this->_modified;
	}

	public function setValidationRules($validationRules){
		$this->_validationRules=$validationRules;
	}

	public function getValidationRules(){
		return $this->_validationRules;
	}
}
