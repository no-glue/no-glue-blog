<?php

namespace application\classes;

class ConfigureLoader{
	public static function help($folder='configure/',$file='host.php'){
		$loaded=require_once($folder.$file);
		$host=(Object)$loader;

		return $host->host;
	}
}