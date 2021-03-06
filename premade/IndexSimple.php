<?php

namespace premade;

class IndexSimple{
	protected $_folder;
	protected $_class;
	protected $_action;
	protected $_params;
	protected $_helpers;
	protected $_observers;

	public function __construct(
		$folder=\premade\Constants::APPLICATION_FOLDER,
		$helpers='IndexSimpleHelpers',
		$observers='IndexSimpleObservers',
		$factory='\\premade\\Factory'

	){
		$this->_folder=$folder;

		$helpers=$factory::create($helpers)->getArrayIterator();

		foreach($helpers as $key=>$helper){
			$this->_helpers[$key]=$factory::create(
				$helper
			);
		}

		$this->_helpers['populate_helper']->populate(
			$this,
			$this->_helpers['request_helper'],
			array('class','action','params')
		);

		$observers=$factory::create($observers)->getArrayIterator();

		foreach($observers as $key=>$observer){
			$this->_observers[$key]=$factory::create($observer);
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
