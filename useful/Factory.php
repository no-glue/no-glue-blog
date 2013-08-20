<?php

namespace useful;

class Factory{
	public static $real=array(
		'Session'=>'SessionDatabase'
	);
	
	public static function create(
		$object,
		$namespace='\\useful\\'
	){
		$object=isset(self::$real[$object])?self::$real[$object]:$object;
		$object=$namespace.$object;

		return new $object;
	}
}
