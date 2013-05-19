<?php

namespace premade;

class PremadeFactory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\premade\\'){
		require_once($lookWhere.$object.$extension);

		$object=$namespace.$object;

		return new $object;
	}
}
