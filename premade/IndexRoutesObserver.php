<?php

namespace premade;

class IndexRoutesObserver{
	public function __construct(){
	}

	public function update($index){
		if($index->getClass()&&$index->getAction()){
			$application=require_once($index->getFolder().'/'.$index->getClass().'.php');
		} else {
			$application=require_once($index->getFolder().'/PageNotFound.php');
			$index->setAction('index');
			$index->setRoutes(array());
		}

		call_user_func_array(array($application,$index->getAction()),$index->getParams());
	}
}
