<?php

namespace premade;

class Factory{
	public static function create(
		$object,
		$lookWhere='',
		$extension='.php',
		$namespace='\\premade\\',
		$methodInstance='getInstance'
	){
		require_once($lookWhere.$object.$extension);

		$object=$namespace.$object;

		if(method_exists($object,$methodInstance)){
			$instance=$object::$methodInstance();
		}else{
			$instance=new $object;
		}

		return $instance;
	}
}
