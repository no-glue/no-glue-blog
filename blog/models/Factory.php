<?php

namespace blog\models;

class Factory{
	public static $real=array();

	public static function create(
		$object,
		$namespace='\\blog\\models\\'
	){
		$object=isset(self::$real[$object])?self::$real[$object]:$object;

		$object=$namespace.$object;

		return new $object;
	}
}
