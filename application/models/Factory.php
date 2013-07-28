<?php

namespace application\models;

class Factory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\application\\models\\'){
		$object=$namespace.$object;

		return new $object;
	}
}
