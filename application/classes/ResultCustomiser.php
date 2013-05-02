<?php

namespace application\classes;

use premade;

class ResultCustomiser{
	public function customise($objectName='Result'){
		require_once('ResultFactory.php');

		$object=\application\classes\ResultFactory::create($objectName);

		require_once('premade/DatabaseWrapperFactory.php');

		$object->setDatabaseWrapper(\premade\DatabaseWrapperFactory::create());

		return $object;
	}
}
