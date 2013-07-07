<?php

namespace premade;

class IndexSimpleObservers{
	protected $_observers=array(
		'index_routes_observer'=>'IndexRoutesObserver'
	);
	protected $_arrayIterator;

	public function __construct(
		$observers=array(),
		$arrayIterator='ArrayIterator'
	){
		!empty($observers) AND
		$this->_observers=array_merge(
			$this->_observers,
			$observers
		);

		$this->_arrayIterator=new $arrayIterator($this->_observers);
	}

	public function getArrayIterator(){
		return $this->_arrayIterator;
	}
}
