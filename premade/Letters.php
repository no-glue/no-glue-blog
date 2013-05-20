<?php

namespace premade;

class Letters{
	protected $_lettersUnderscoresOnly;
	protected $_lettersUnderscoresNumbersOnly;

	public function __construct(){
		$this->_class='/[^a-z_]/';
		$this->_paramValues='/[^a-z_0-9]/';
	}

	public function check($word,$rule){
		if(!$word){
			return $word;
		}

		$rule='_'.$rule;

		if(preg_match_all($this->$rule,$word)){
			return NULL;
		}

		return TRUE;
	}

	public function checkParams($params,
		$ruleKeys='class',
		$ruleValues='paramValues'
	){
		$check=TRUE;
		$ruleKeys='_'.$ruleKeys;
		$ruleValues='_'.$ruleValues;

		foreach($params as $key=>$param){
			$check&=
				$this->check($key,$ruleKeys)&
				$this->check($param,$ruleValues);

			if(!$check){
				return $check;
			}
		}

		return $check;
	}
}
