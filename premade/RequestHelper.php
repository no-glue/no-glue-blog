<?php

namespace premade;

class RequestHelper{
	protected $_delegates;

	public function __construct(
		$delegates=array(
			'letters'=>array(
				'object'=>'Letters'
			),
			'request_formatter'=>array(
				'object'=>'RequestFormatter'
			)
		),
		$delegatesGroup=array(
			'factory_file'=>'PremadeFactory.php',
			'factory'=>'\\premade\\PremadeFactory'
		)
	){
		require_once($delegatesGroup['factory_file']);

		foreach($delegates as $key=>$delegate){
			$this->_delegates[$key]=
				$delegatesGroup['factory']::create(
					$delegate['object']
				);
		}
	}

	public function getClass(){
		$class=NULL;

		isset($_REQUEST['class']) AND
		$this->_delegates['letters']
			->check($_REQUEST['class'],'class') AND
		$class=
			$this->_delegates['request_formatter']
				->getCorrectClass($_REQUEST['class']);

		return $class;
	}

	public function getAction(){
		$action=NULL;

		isset($_REQUEST['action']) AND
		$this->_delegates['letters']
			->check($_REQUEST['action'],'class') AND
		$action=
			$this->_delegates['request_formatter']
				->getCorrectAction($_REQUEST['action']);

		return $action;
	}

	public function getParams($params=array()){
		require_once('Constants.php');

		empty($params) AND 
		$params=array_slice($_REQUEST,2);

		$requestType=(string)$_SERVER['REQUEST_METHOD'];

		$requestType!==(string)\premade\Constants::REQUEST_POST AND
		!$this->_delegates['letters']
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
