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
		$observers=array(
			'index_routes_observer'=>array(
				'factory'=>'\\premade\\PremadeFactory',
				'object'=>'IndexRoutesObserver'
			)
		)

	){
		require_once('PremadeFactory.php');

		$this->_folder=$folder;

		$requestHelper=\premade\PremadeFactory::create($requestHelper);

		$this->_class=$requestHelper->getClass();
		$this->_action=$requestHelper->getAction();
		$this->_params=$requestHelper->getParams();

		$this->populate(
			$requestHelper,
			array('class','action','params')
		);

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

	protected function populate(
		$provider,
		$members,
		$conventionMember='_',
		$conventionCall='get'
	){
		foreach($members as $member){
			$mine=$conventionMember.$member;
			$call=$convention.ucfirst($member);
			$this->{$mine}=$provider->{$call};
		}
	}
}
