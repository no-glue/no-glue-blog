<?php

namespace application\classes;

class Form{
	protected static function _helper($helper,$helpers=array(
		'configure_loader'=>'\application\classes\ConfigureLoader')){
		return $helpers[$helper];
	}

	public function open($class,$action,$wrapOpen='',$wrapClose='',$method='post'){
		$configureLoader=self::_helper('configure_loader');
		$host=$configureLoader::help()['host'];

		$string='<form method=\''.$method.'\' action=\''.$host.'\'>';
		$string.=$wrapOpen.'<input type=\'hidden\' name=\'class\' value=\''.$class.'\' />'.$wrapClose;
		$string.=$wrapOpen.'<input type=\'hidden\' name=\'action\' value=\''.$action.'\' />'.$wrapClose;

		return $string;
	}

	public function close(){
		return '</form>';
	}
}
