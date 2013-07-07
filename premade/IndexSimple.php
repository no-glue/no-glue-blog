<?php

namespace premade;

require_once('Constants.php');

class IndexSimple{
	protected $_folder;
	protected $_class;
	protected $_action;
	protected $_params;
	protected $_observers;

	public function __construct(
		$folder=\premade\Constants::APPLICATION_FOLDER,
		$requestHelper=\premade\IndexSimpleConstants::REQUEST_HELPER,
		$populateHelper=\premade\IndexSimpleConstants::POPULATE_HELPER,
		$observers=\premade\IndexSimpleConstants::OBSERVERS

	){
		require_once('PremadeFactory.php');

		$this->_folder=$folder;

		$requestHelper=\premade\PremadeFactory::create($requestHelper);

		$populateHelper=\premade\PremadeFactory::create($populateHelper);

		$populateHelper->populate(
			$this,
			$requestHelper,
			array('class','action','params')
		);

		$observers=\premade\PremadeFactory::create($observers)
			->getArrayIterator();

		foreach($observers as $key=>$observer){
			$this->_observers[$key]=
				\premade\PremadeFactory::create($observer);
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
