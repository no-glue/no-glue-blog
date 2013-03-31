<?php

namespace tests;

class IndexTestsObserver{
	protected $_postDao;

	public function __construct($postDao){
		$this->_postDao=$postDao;
	}

	public function update($index){
		$tests=$index->getTests();

		foreach($tests as $testName=>$testFunction){
			$testFunction='_'.$testFunction;
			$this->$testFunction($index,$testName);
		}

		$this->_printTestsSucceeded($index);
		$this->_printTestsFailed($index);
	}

	protected function _printTestsSucceeded($index){
		print "Successful tests\n\n";

		$testsSucceeded=$index->getTestsSucceeded();

		foreach($testsSucceeded as $testName){
			print "$testName\n\n";
		}
	}

	protected function _printTestsFailed($index){
		print "Failed tests\n\n";

		$testsFailed=$index->getTestsFailed();

		foreach($testsFailed as $testName){
			print "$testName\n\n";
		}
	}

	protected function _testDatabase($index,$testName){
		$posts=$this->_postDao->getPosts();
		$actual=(int)$posts[0]->getId();
		$expected=(int)1;
		$claim=$actual.'=='.$expected;		

		if(assert($claim)){
			$index->addTestSucceeded($testName);
		} else {
			$index->addTestFailed($testName);
		}
	}
}
