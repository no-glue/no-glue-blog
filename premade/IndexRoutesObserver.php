<?php

namespace premade;

class IndexRoutesObserver{
	public function __construct(){
	}

	public function update($index){
		$routes=$index->getRoutes();

		if($routes['class']&&$routes['action']){
			$application=require_once($routes['folder'].'/'.$routes['class'].'.php');
		} else {
			$application=require_once($routes['folder'].'/PageNotFound.php');
			$routes['action']='index';
		}

		$application->$routes['action']($routes['params']);
	}
}
