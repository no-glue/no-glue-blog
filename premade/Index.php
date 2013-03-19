<?php

namespace premade;

class Index{
	protected $_routes;
	protected $_observers;

	public function __construct($routesCallback,$observersCallback){
		$this->_routes=$routesCallback();
		var_dump($this->_routes);
		$this->_observers=$observersCallback();
		var_dump($this->_observers);
	}

	public function attachObserver($observerKey,$observer){
		$this->_observers[$observerKey]=$observer;
	}

	public function detachObserver($observerKey){
		unset($this->_observers[$observerKey]);
	}
}
