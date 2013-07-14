<?php

namespace premade;

class IndexSimpleHelpers{
	protected $_helpers=array(
		'request_helper'=>'RequestHelper',
		'populate_helper'=>'PopulateHelper'
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
