<?php

namespace tests;

require_once('IndexTestsObserverFactory.php');

class Index{
	protected $_postDao;
	protected $_observers;
	protected $_tests;
	protected $_testsSucceeded;
	protected $_testsFailed;

	public function __construct($postDao=NULL,
		$observers=array(),
		$tests=array()
		){
		$this->_postDao=$postDao;
		$this->_observers=$observers;
		$this->_tests=$tests;

		$this->_notify();
	}

	public function attachObserver($observerKey,$observer){
		$this->_observers[$observerKey]=$observer;
	}

	public function detachObserver($observerKey){
		unset($this->_observers[$observerKey]);
	}

	public function getTests(){
		return $this->_tests;
	}

	public function addTestSucceeded($test){
		$this->_testsSucceeded[]=$test;
	}

	public function getTestsSucceeded(){
		return $this->_testsSucceeded;
	}

	public function addTestFailed($test){
		$this->_testsFailed[]=$test;
	}

	public function getTestsFailed(){
		return $this->_testsFailed;
	}

	protected function _notify(){
		foreach($this->_observers as $key=>$observer){
			$observer->update($this);
		}
	}
}

new \tests\Index(NULL,array(
	'IndexTestsObserver'=>\tests\IndexTestsObserverFactory::create()
),array('test_database'=>'testDatabase'));
