<?php

namespace premade;

/**
* Index
*
* It is used as front action controller
* 
* @property array $_routes routes
* @property array $_observers what will be done on state change
*/
class Index{
	/**
	* @access protected
	* @var array
	*/
	protected $_routes;
	/**
	* @access protected
	* @var array
	*/
	protected $_observers;

	/**
	* __construct
	*
	* called when object created
	*
	* @param callable $routesCallback callback to call for routes
	* @param callable $observersCallback callback to call for observers
	*/
	public function __construct($routesCallback,$observersCallback){
		$this->_routes=$routesCallback();
		$this->_observers=$observersCallback();
		$this->_notify();
	}

	/**
	* getRoutes
	*
	* returns routes
	*
	* @return array $this->_routes
	*/
	public function getRoutes(){
		return $this->_routes;
	}

	/**
	* attachObserver
	*
	* attaches an observer
	*
	* @param string $observerKey name of the observer
	* @param mixed $observer observer object
	* @return NULL
	*/
	public function attachObserver($observerKey,$observer){
		$this->_observers[$observerKey]=$observer;
	}

	/**
	* detachObserver
	*
	* detaches an observer
	*
	* @param string $observerKey name of the observer
	* @return NULL
	*/
	public function detachObserver($observerKey){
		unset($this->_observers[$observerKey]);
	}
	
	/**
	* _notify
	*
	* notifies observers that state has changed
	*
	* @return NULL
	*/
	protected function _notify(){
		foreach($this->_observers as $key=>$observer){
			$observer->update($this);
		}
	}
}
