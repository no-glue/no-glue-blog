<?php

namespace tests;

class IndexTestsObserver{
	public function __construct(){}

	public function update($index){
		$tests=$index->getTests();

		foreach($tests as $testName=>$testFunction){
			$testFunction='_'.$testFunction;
			$this->$testFunction($index);
		}

		$this->_printSuccessfulTests($index);
		$this->_printFailedTests($index);
	}

	protected function _printSuccessfulTests($index){
		print "Successful tests\n\n";

		$testsSucceeded=$index->getTestsSucceeded();

		foreach($testsSucceeded as $testName){
			print "$testName\n\n";
		}
	}

	protected function _printFailedTests($index){
		print "Failed tests\n\n";

		$testsFailed=$index->getTestsFailed();

		foreach($testsFailed as $testName){
			print "$testName\n\n";
		}
	}

	protected function _testDatabase($index){
	}
}
