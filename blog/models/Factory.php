<?php

namespace blog\models;

class Factory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\blog\\models\\'){
		$object=$namespace.$object;

		return new $object;
	}
}
