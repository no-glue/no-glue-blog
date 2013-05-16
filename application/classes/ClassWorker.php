<?php

namespace application\classes;

class ClassWorker{
	public static function work($object,$function,$values=array()){
		require_once('application/classes/ClassFactory.php');

		return call_user_func_array(array(
			\application\classes\ClassFactory::create($object),
			$function
			),
			$values
		);
	}
}
