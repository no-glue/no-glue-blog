<?php

namespace premade;

class IndexSimple{
	protected $_folder;
	protected $_class;
	protected $_action;
	protected $_params;
	protected $_requestType;

	public function __construct(
		$folder=array(
			'function'=>'load',
			'params'=>'folder'
		),
		$class=array(
			'function'=>'getGlass'
		),
		$action=array(
			'function'=>'getAction'
		),
		$params=array(
			'function'=>'getParams'
		),
		$requestType=array(
			'function'=>'getRequestType'
		),
		$folderGroup=array(
			'factory_file'=>'PremadeFactory.php',
			'factory'=>'\\premade\\PremadeFactory',
			'object'=>'ConfigureLoader'
		),
		$requestGroup=array(
			'factory'=>'\\premade\\PremadeFactory',
			'object'=>'RequestHelper'
		)
	){
		require_once($folderGroup['factory_file']);

		$configureLoader=
			$folderGroup['factory']::create(
				$folderGroup['object']
			);

		$this->_folder=
			$configureLoader->folder['function']($folder['params']);

		$requestHelper=
			$requestGroup['factory']::create(
				$requestGroup['object']
			);

		$this->_class=$requestHelper->$class['function']();
		$this->_action=$requestHelper->$action['function']();
		$this->_params=$requestHelper->$params['function']();
		$this->_requestType=$requestHelper->$requestType['function']();
	}
}
