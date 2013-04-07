<?php

namespace application\models;

class ValidationRules{
	protected $_validationRules;

	public function __construct(){
		$this->_validationRules=array(
			'notempty'=>function($item){
				$item=(bool)$item;

				if(!$item){
					return NULL;
				} else {
					return $item;
				}
			});
	}

	public function getValidationRules(){
		return $this->_validationRules;
	}

	public function keep(){
		if(func_num_args()){
			$argumentsList=func_get_args();
			$validationRules=array();

			foreach($argumentsList as $rule){
				$validationRules[$rule]=$this->_validationRules[$rule];
			}

			$this->_validationRules=$validationRules;
		}
	}
}
