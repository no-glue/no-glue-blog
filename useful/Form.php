<?php

namespace application\classes;

require_once('premade/Constants.php');

use premade;

class Form{
	public function open(
		$class,
		$action,
		$wrapOpen='',
		$wrapClose='',
		$method='post',
		$host=\premade\Constants::HOST
	){
		$string='<form method=\''.$method.'\' action=\''.$host.'\'>';
		$string.=$wrapOpen.'<input type=\'hidden\' name=\'class\' value=\''.$class.'\' />'.$wrapClose;
		$string.=$wrapOpen.'<input type=\'hidden\' name=\'action\' value=\''.$action.'\' />'.$wrapClose;

		return $string;
	}

	public function close(){
		return '</form>';
	}
}
