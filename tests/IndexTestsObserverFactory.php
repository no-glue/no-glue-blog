<?php

namespace tests;

require_once('premade/DatabaseWrapperFactory.php');
require_once('application/models/PostDao.php');
require_once('IndexTestsObserver.php');

use premade;
use application\models;

class IndexTestsObserverFactory{
	public static function create($object='\tests\IndexTestsObserver'){
		return new $object(
			new \application\models\PostDao(
				\premade\DatabaseWrapperFactory::create()
			)
		);
	}
}
