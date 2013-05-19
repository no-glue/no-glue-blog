<?php

namespace premade;

class RequestHelper{
	public function __construct(){}

	public function getClass(){
		$class=NULL;

		isset($_REQUEST['class']) AND
		$class=$_REQUEST['class'];

		return $class;
	}

	public function getAction(){
		$action=NULL;

		isset($_REQUEST['action']) AND
		$action=$_REQUEST['action'];

		return $action;
	}

	public function getParams(){
		return array_slice($_REQUEST,2);
	}

	public function getRequestType(){
		return $_SERVER['REQUEST_METHOD'];
	}
}
