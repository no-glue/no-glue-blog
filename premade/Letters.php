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

	public function getCorrectExpression($word,$callback,$rule='_lettersUnderscoresOnly'){
		if(!$word){
			return $word;
		}

		if(preg_match_all($this->$rule,$word)){
			return NULL;
		}

		return $callback(str_replace(' ','',ucwords(str_replace('_',' ',$word))));
	}

	public function getCorrectParams($array,$callback,$rule){
		foreach($array as $key=>$item){
			if(!item){
				return $item;
			}

			if(preg_match_all($this->$rule,$item)){
				return NULL;
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
