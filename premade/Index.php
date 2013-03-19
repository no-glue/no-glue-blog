<?php

namespace premade;

class Index{
	protected $_routes;
	protected $_observers;

	public function __construct($routesCallback){
		$this->_routes=$routesCallback();
		var_dump($this->_routes);
		var_dump($this->_observers);
	}
}
