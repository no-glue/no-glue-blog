<?php

namespace tests;

require_once('IndexTestsObserverFactory.php');

class Index{
	protected $_postDao;
	protected $_observers;
	protected $_tests;

	public function __construct($postDao=NULL,
		$observers=array(),
		$tests=array()
		){
		$this->_postDao=$postDao;
		$this->_observers=$observers;
		$this->_tests=$tests;

		print 'Tests Index';
		
		$this->_notify();
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

new \tests\Index(NULL,array(
	'IndexTestsObserver'=>\tests\IndexTestsObserverFactory::create()
),array());
