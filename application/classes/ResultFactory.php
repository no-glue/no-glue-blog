<?php

namespace application\classes;

class ResultFactory{
	public static function create($object='Result',
	$lookWhere='',
	$extension='.php',
	$namespace='\\application\\classes\\'){
		require_once($lookWhere.$object.$extension);

		$object=$namespace.$object;

		return new $object;
	}
}
