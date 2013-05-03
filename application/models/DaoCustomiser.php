<?php

namespace application\models;

use premade;

class DaoCustomiser{
	public static function customise($object){
		require_once('DaoFactory.php');
		require_once('premade/DatabaseWrapperFactory.php');

		$object=\application\models\DaoFactory::create($object);

		$object->set(\premade\DatabaseWrapperFactory::create());
		
		return $object;
	}
}
