<?php

namespace application;

class Factory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\application\\'){
		$object=$namespace.$object;

		return new $object;
	}
}
