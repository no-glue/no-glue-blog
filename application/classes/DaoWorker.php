<?php

namespace application\classes;

use application\models;

class DaoWorker{
	public static function work($object,$function,$values=array()){
		require_once('application/models/DaoFactory.php');

		return call_user_func_array(array(
			\application\models\DaoFactory::create($object),
			$function
			),
			$values
		);
	}
}
