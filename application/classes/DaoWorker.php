<?php

namespace application\classes;

use application\models;

class DaoWorker{
	public static function work($object,$function,$values=array()){
		require_once('application/models/DaoCustomiser.php');

		return call_user_func_array(array(
			\application\models\DaoCustomiser::customise($object),
			$function
			),
			$values
		);
	}
}
