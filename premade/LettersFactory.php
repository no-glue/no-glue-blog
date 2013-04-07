<?php

namespace premade;

require_once('Letters.php');

class LettersFactory{
	public static function create($object='\premade\Letters'){
		return $object::getInstance();
	}
}
