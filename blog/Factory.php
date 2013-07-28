<?php

namespace blog;

class Factory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\blog\\'){
		$object=$namespace.$object;

		return new $object;
	}
}
