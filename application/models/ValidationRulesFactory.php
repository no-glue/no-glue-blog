<?php

namespace application\models

require_once('ValidationRules.php');

class ValidationRulesFactory{
	public static function create($object='\application\models\ValidationRules'){
		return new $object;
	}
}
