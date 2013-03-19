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
		$this->_update();
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
