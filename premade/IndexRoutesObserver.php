<?php

namespace premade;

class IndexRoutesObserver{
	public function __construct(){
	}

	public function update($index){
		$routes=$index->getRoutes();
		$application=require_once($routes['folder'].'/'.$routes['class'].'.php');
		$application->$routes['action']($routes['params']);
	}
}
