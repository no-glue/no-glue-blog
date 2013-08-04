<?php

namespace premade;

class IndexRoutesObserver{
	public function __construct(){
	}

	public function update(
		$index,
		$defaultIndex=\premade\Constants::DEFAULT_INDEX,
		$defaultAction=\premade\Constants::DEFAULT_ACTION
	){
		if($index->getClass()&&$index->getAction()){
			$application=require_once($index->getFolder().'/'.$index->getClass().'.php');
		} else {
			$application=require_once(
				$index->getFolder().$defaultIndex
			);

			$index->setAction($defaultAction);
		}

		call_user_func_array(array($application,$index->getAction()),$index->getParams());
	}
}
