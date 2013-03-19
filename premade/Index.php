<?php

namespace premade;

class Index{
	protected $_routes;

	public function __construct($routesCallback=NULL){
		var_dump(($this->_routes=$routesCallback()));
	}
}
