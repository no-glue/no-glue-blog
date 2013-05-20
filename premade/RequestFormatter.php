<?php

namespace premade;

class RequestFormatter{
	public function __construct(){}

	public function getCorrectClass($word){
		return str_replace(' ','',ucwords(str_replace('_',' ',$word)));
	}

	public function getCorrectAction($word){
		return lcfirst($this->getCorrectClass($word));
	}
}
