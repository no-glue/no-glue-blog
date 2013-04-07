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
		print "++++++++++++++++++++++++++++++++++++++++++++++\n\n";

		$testsSucceeded=$index->getTestsSucceeded();

		foreach($testsSucceeded as $testName){
			print "$testName\n\n";
		}
	}

	protected function _printTestsFailed($index){
		print "Failed tests\n\n";
		print "----------------------------------------------\n\n";

		$testsFailed=$index->getTestsFailed();

		foreach($testsFailed as $testName){
			print "$testName\n\n";
		}
	}

	protected function _testDatabaseConnect($index,$testName){
		print "$testName\n\n";
		print "..............................................\n\n";

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

	protected function _testValidationPositive($index,$testName){
		print "$testName\n\n";
		print "..............................................\n\n";

		$actual=(string)'\''.$this->_postDao->validate(new \application\models\PostVo(
			NULL,
			'far-far-new',
			'far far away',
			'far far away',
			time(),
			time()
		))->getName().'\'';
		$expected=(string)'\'far-far-new\'';
		$claim=$actual.'=='.$expected;

		if(assert($claim)){
			$index->addTestSucceeded($testName);
		} else {
			$index->addTestFailed($testName);
		}
	}

	protected function _testValidationNegative($index,$testName){
		print "$testName\n\n";
		print "..............................................\n\n";

		$actual=(int)$this->_postDao->validate(new \application\models\PostVo(
			NULL,
			'',
			'far far away',
			'far far away',
			time(),
			time()
		));
		$expected=(int)NULL;
		$claim=$actual.'=='.$expected;

		if(assert($claim)){
			$index->addTestSucceeded($testName);
		} else {
			$index->addTestFailed($testName);
		}
	}	

	protected function _testInsertToDatabase($index,$testName){
		print "$testName\n\n";
		print "..............................................\n\n";

		$actual=(int)$this->_postDao->save(new \application\models\PostVo(
			NULL,
			'far-far-new',
			'far far away',
			'far far away',
			time(),
			time()
		));
		$expected=(int)1;
		$claim=$actual.'=='.$expected;

		if(assert($claim)){
			$index->addTestSucceeded($testName);
		} else {
			$index->addTestFailed($testName);
		}
	}
		
}
