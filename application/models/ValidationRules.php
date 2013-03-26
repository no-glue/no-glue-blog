<?php

namespace application\models;

class ValidationRules{
	protected $_validationRules;

	public function __construct($validationRules=array()){
		$this->_validationRules=array(
			'notempty'=>function($item){
				if(empty($item)){
					return NULL;
				} else {
					return $item;
				}
			});

		$this->_validationRules=array_merge($this->_validationRules,
				$validationRules
			);
	}

	public function setValidationRules($validationRules){
		$this->_validationRules=array_merge($this->_validationRules,
				$validationRules
			);	
	}

	public function getValidationRules(){
		return $this->_validationRules;
	}
}
