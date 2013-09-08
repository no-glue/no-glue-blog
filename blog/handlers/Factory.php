<?php

namespace blog\handlers;

class Factory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\blog\\handlers\\'){
		$object=$namespace.$object;

		return new $object;
	}
}
