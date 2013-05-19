<?php

namespace premade;

class IndexSimple{
	protected $_folder;
	protected $_class;
	protected $_action;
	protected $_params;
	protected $_observers;

	public function __construct(
		$folder=array(
			'function'=>'load',
			'params'=>'folder'
		),
		$class=array(
			'function'=>'getClass'
		),
		$action=array(
			'function'=>'getAction'
		),
		$params=array(
			'function'=>'getParams'
		),
		$folderGroup=array(
			'factory_file'=>'PremadeFactory.php',
			'factory'=>'\\premade\\PremadeFactory',
			'object'=>'ConfigureLoader'
		),
		$requestGroup=array(
			'factory'=>'\\premade\\PremadeFactory',
			'object'=>'RequestHelper'
		),
		$observers=array(
			'index_routes_observer'=>array(
				'factory'=>'\\premade\\PremadeFactory',
				'object'=>'IndexRoutesObserver'
			)
		)

	){
		require_once($folderGroup['factory_file']);

		$configureLoader=
			$folderGroup['factory']::create(
				$folderGroup['object']
			);

		$this->_folder=
			$configureLoader->{$folder['function']}($folder['params']);

		$requestHelper=
			$requestGroup['factory']::create(
				$requestGroup['object']
			);

		$this->_class=$requestHelper->{$class['function']}();
		$this->_action=$requestHelper->{$action['function']}();
		$this->_params=$requestHelper->{$params['function']}();

		foreach($observers as $key=>$observer){
			$this->_observers[$key]=
				$observer['factory']::create(
					$observer['object']
				);
		}

		$this->_notify();
	}

	public function setFolder($folder){
		$this->_folder=$folder;
	}

	public function getFolder(){
		return $this->_folder;
	}

	public function setClass($class){
		$this->_class=$class;
	}

	public function getClass(){
		return $this->_class;
	}
	
	public function setAction($action){
		$this->_action=$action;
	}

	public function getAction(){
		return $this->_action;
	}

	public function setParams($params){
		$this->_params=$params;
	}

	public function getParams(){
		return $this->_params;
	}

	public function attachObserver($observerKey,$observer){
		$this->_observers[$observerKey]=$observer;
	}

	public function detachObserver($observerKey){
		unset($this->_observers[$observerKey]);
	}

	protected function _notify(){
		foreach($this->_observers as $key=>$observer){
			$observer->update($this);
		}
	}
}
