<?php

namespace application\models;

class VoFactory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\application\\models\\'){
		require_once($lookWhere.$object.$extension);

		return new $namespace.$object;
	}
}
