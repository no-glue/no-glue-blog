<?php

namespace application\models;

require_once('ValidationRulesFactory.php');

class ValidationRulesRefinery{
	public static function refine(){
		$argumentsList=func_get_args();
		$instance=ValidationRulesFactory::create($argumentsList[0]);

		if(func_num_args()>1){
			call_user_func_array(array($instance,'keep'),array_slice($argumentsList,1));
		}

		return $instance;
	}
}
