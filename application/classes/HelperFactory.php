<?php

namespace application\classes;

class HelperFactory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\application\\classes\\'){
		require_once($lookWhere.$object.$extension);

		$object=$namespace.$object;

		return new $object;
	}
}
