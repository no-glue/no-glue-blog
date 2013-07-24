<?php

namespace application\models;

class Factory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\application\\models\\'){
		require_once($lookWhere.$object.$extension);

		$object=$namespace.$object;

		return new $object;
	}
}
