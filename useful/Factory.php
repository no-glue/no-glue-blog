<?php

namespace useful;

class Factory{
	public static function create($object,
	$lookWhere='',
	$extension='.php',
	$namespace='\\useful\\',
	$methodRedirect='another'
	){
		$require=$lookWhere.$object.$extension;

		$object=$namespace.$object;

		method_exists($object,$methodRedirect) AND
		$redirect=$object::$methodRedirect() AND
		$require=$lookWhere.$redirect.$extension AND
		$redirect=$namespace.$redirect AND
		$object=$redirect;

		return new $object;
	}
}
