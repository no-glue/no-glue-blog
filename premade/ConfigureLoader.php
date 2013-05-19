<?php

namespace premade;

class ConfigureLoader{
	public function __construct(){}

	public function load($what,$from='configure/routes.php'){
		$configure=require_once($from);

		return $configure[$what];
	}
}
