<?php

namespace application\classes;

class ConfigureLoader{
	public static function load($folder,$file){
		$loaded=require_once($folder.'/'.$file);

		return (Object)$loaded;
	}
}
