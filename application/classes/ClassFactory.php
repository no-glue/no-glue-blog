<?php

namespace application\classes;

class ClassFactory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\application\\classes\\'){
		$require=$lookWhere.$object.$extension;
		$object=$namespace.$object;

		method_exists($object,'redirect') AND
		$redirect=$object::redirect() AND
		$require=$lookWhere.$redirect.$extension AND
		$redirect=$namespace.$redirect AND
		$object=$redirect;

		require_once($require);

		return new $object;
	}
}
