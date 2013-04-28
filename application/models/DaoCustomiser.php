<?php

namespace application\models;

use premade;

class DaoCustomiser{
	public static function customise($objectName){
		require_once('DaoFactory.php');

		$object=\application\models\DaoFactory::create($objectName);

		require_once('premade/DatabaseWrapperFactory.php');

		$object->set(\premade\DatabaseWrapperFactory::create());

		return $object;
	}
}
