<?php

namespace application\classes;

use premade;

class ResultCustomiser{
	public static function customise($object='Result'){
		require_once('ResultFactory.php');
		require_once('premade/DatabaseWrapperFactory.php');

		$object=\application\classes\ResultFactory::create($object);

		$object->setDatabaseWrapper(\premade\DatabaseWrapperFactory::create());
		
		return $object;
	}
}
