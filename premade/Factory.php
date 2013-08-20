<?php

namespace premade;

class Factory{
	public static $real=array();

	public static function create(
		$object,
		$lookWhere='',
		$namespace='\\premade\\',
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
