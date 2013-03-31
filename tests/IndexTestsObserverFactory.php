<?php

namespace tests;

require_once('IndexTestsObserver.php');
require_once('application/models/PostDao.php');

use application\models;

class IndexTestsObserverFactory{
	public static function create($object='\tests\IndexTestsObserver'){
		return new $object(
			new \application\models\PostDao(
				\premade\DatabaseConnectionFactory::create()
			)
		);
	}
}
