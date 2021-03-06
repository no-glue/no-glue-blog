<?php

namespace premade;

class RequestHelperHelpers{
	protected $_helpers=array(
		'letters'=>'Letters',
		'request_formatter'=>'RequestFormatter'
	);
	protected $_arrayIterator;

	public function __construct(
		$helpers=array(),
		$arrayIterator='ArrayIterator'
	){
		!empty($helpers) AND
		$this->_helpers=array_merge(
			$this->_helpers,
			$helpers
		);

		$this->_arrayIterator=new $arrayIterator($this->_helpers);
	}

	public function getArrayIterator(){
		return $this->_arrayIterator;
	}
}
