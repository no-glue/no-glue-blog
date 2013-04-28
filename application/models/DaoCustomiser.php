<?php

namespace application\models;

class DaoCustomiser{
	public static function customise($object,$values){
		$object->set($values);

		return $object;
	}
}
