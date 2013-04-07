<?php

namespace premade;

class IndexRoutesObserver{
	public function __construct(){
	}

	public function update($index){
		$routes=$index->getRoutes();

		if($routes['class']&&$routes['action']&&!is_null($routes['params'])){
			$application=require_once($routes['folder'].'/'.$routes['class'].'.php');
		} else {
			$application=require_once($routes['folder'].'/PageNotFound.php');
			$routes['action']='index';
			$routes['params']=array();
		}

		call_user_func_array(array($application,$routes['action']),$routes['params']);
	}
}
