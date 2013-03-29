<?php

namespace tests;

class IndexTestsObserver{
	public function __construct(){}

	public function update($index){
		$tests=$index->getTests();

		foreach($tests as $testName=>$function){
			$this->$function($index);
		}

		$this->_printSuccessfulTests($index);
		$this->_printFailedTests($index);
	}

	protected function _printSuccessfulTests($index){
		print "Successful tests\n\n";
	}

	protected function _printFailedTests($index){
		print "Failed tests\n\n";
	}

	protected function _testDatabase($index){
	}
}
