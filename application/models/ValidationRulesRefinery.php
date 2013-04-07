<?php

namespace application\models;

require_once('ValidationRulesFactory.php');

class ValidationRulesRefinery{
	public static function refine($object='\application\models\ValidationRules'){
		$instance=\application\models\ValidationRulesFactory::create($object);

		if(func_num_args()>1){
			call_user_func_array(array($instance,'keep'),array_slice(func_get_args(),1));
		}

		return $instance;
	}
}
