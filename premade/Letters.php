<?php

namespace premade;

class Letters{
	protected $_lettersUnderscoresOnly;
	protected static $_instance;

	public function __construct(){
		$this->_lettersUnderscoresOnly='/[^a-z_]/';
	}

	public function lettersUnderscoresOnly($word,$callback){
		if(!$word){
			return $word;
		}

		if(preg_match_all($this->_lettersUnderscoresOnly,$word)){
			return NULL;
		}

		return $callback(str_replace(' ','',ucwords(str_replace('_',' ',$word))));
	}

	public static function getInstance(){
		if(!self::$_instance){
			self::$_instance=new \premade\Letters();
		}

		return self::$_instance;
	}
}
