<?php

namespace application\classes;

class SessionFactory{
	public static function create(
	$object='SessionDatabase',
	$lookWhere='',
	$extension='.php',
	$namespace='\\application\\classes\\'){
		require_once($lookWhere.$object.$extension);

		$object=$namespace.$object;

		return new $object;
	}
}
