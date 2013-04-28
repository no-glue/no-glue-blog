<?php

namespace application\models;

class DaoCustomiser{
	public static function customise($values,$objectName){
		require_once('DaoFactory.php');

		$object=\application\models\DaoFactory::create($objectName);

		$object->set($values);

		return $object;
	}
}
