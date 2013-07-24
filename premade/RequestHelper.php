<?php

namespace premade;

class RequestHelper{
	protected $_helpers;

	public function __construct(
		$helpers=\premade\Constants::REQUEST_HELPER_HELPERS
	){
		$helpers=\premade\Factory::create($helpers)
			->getArrayIterator();

		foreach($helpers as $key=>$helper){
			$this->_helpers[$key]=
				\premade\Factory::create($helper);
		}
	}

	public function getClass(){
		$class=NULL;

		isset($_REQUEST['class']) AND
		$this->_helpers['letters']
			->check($_REQUEST['class'],'class') AND
		$class=
			$this->_helpers['request_formatter']
				->getCorrectClass($_REQUEST['class']);

		return $class;
	}

	public function getAction(){
		$action=NULL;

		isset($_REQUEST['action']) AND
		$this->_helpers['letters']
			->check($_REQUEST['action'],'class') AND
		$action=
			$this->_helpers['request_formatter']
				->getCorrectAction($_REQUEST['action']);

		return $action;
	}

	public function getParams($params=array()){
		empty($params) AND 
		$params=array_slice($_REQUEST,2);

		$requestType=(string)$_SERVER['REQUEST_METHOD'];

		$requestType!==(string)\premade\Constants::REQUEST_POST AND
		!$this->_helpers['letters']
			->checkParams($params) AND 
		$params=array();

		$params=
			array_merge(
				array('request_type'=>$requestType),
				array('request_object'=>(Object)$params)
			);

		return $params;
	}
}
