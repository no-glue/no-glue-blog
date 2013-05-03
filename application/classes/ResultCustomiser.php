<?php

namespace application\classes;

use premade;

class ResultCustomiser{
	public static function customise($object='Result'){
		require_once('ClassFactory.php');
		require_once('premade/DatabaseWrapperFactory.php');

		$object=\application\classes\ClassFactory::create($object);

		$object->setDatabaseWrapper(\premade\DatabaseWrapperFactory::create());
		
		return $object;
	}
}
