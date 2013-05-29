<?php

namespace application;

class Factory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\application\\'){
		require_once($lookWhere.$object.$extension);

		$object=$namespace.$object;

		return new $object;
	}
}
