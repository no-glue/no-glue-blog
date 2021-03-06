<?php

namespace blog\think;

class Factory{
	public static $real=array();

	public static function create(
		$object,
		$namespace='\\blog\\think\\',
		$methodInstance='getInstance'
	){
		$object=isset(self::$real[$object])?self::$real[$object]:$object;

		$object=$namespace.$object;

		if(method_exists($object,$methodInstance)){
			$instance=$object::$methodInstance();
		}else{
			$instance=new $object;
		}

		return $instance;
	}
}
