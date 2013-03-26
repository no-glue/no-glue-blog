<?php

namespace premade;

class Letters{
	protected $_lettersUnderscoresOnly;
	protected $_lettersUnderscoresNumbersOnly;
	protected static $_instance;

	public function __construct(){
		$this->_lettersUnderscoresOnly='/[^a-z_]/';
		$this->_lettersUnderscoresNumbersOnly='/[^a-z_0-9]/';
	}

	protected function _check($word,$rule){
		if(!$word){
			return $word;
		}

		if(preg_match_all($this->$rule,$word)){
			return NULL;
		}

		return TRUE;
	}

	public function getCorrectClass($word,$callback,$rule){
		$check=$this->_check($word,$rule);

		if(!$check){
			return $check;
		}

		return $callback(str_replace(' ','',ucwords(str_replace('_',' ',$word))));
	}

	public function getCorrectParams($array,$callback,$rule){
		foreach($array as $key=>$item){
			$check=$this->_check($item,$rule);

			if(!$check){
				return $check;
			}

			$array[$key]=$callback($item);
		}

		return $array;
	}

	public static function getInstance(){
		if(!self::$_instance){
			self::$_instance=new \premade\Letters();
		}

		return self::$_instance;
	}
}
