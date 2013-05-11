<?php

namespace application\classes;

require_once('ConfigureLoader.php');

class Links{
	protected static function _helper($helper,$helpers=array(
		'configure_loader'=>'\application\classes\ConfigureLoader')){
		return $helpers[$helper];
	}

	public function link($class,$action,$text,$parameters=array(),$host=''){
		$host=(string)$host;

		if($host!==''){
			return '<a href=\''.$host.'\'>'.$text.'</a>';
		}

		$configureLoader=self::_helper('configure_loader');
		$host=$configureLoader::help();

		$result='<a href=\''.$host.'?class='.$class.'&action='.$action;

		foreach($parameters as $parameter=>$value){
			$result.='&'.$parameter.'='.$value;
		}

		$result.='\'>';
		$result.=$text;
		$result.='</a>';

		return $result;
	}

	public function css($location,$type='text/css',$rel='stylesheet'){
		return '<link href=\''.$location.'\' type=\''.$type.'\' rel=\''.$rel.'\'/>';
	}

	public function lineForm($class,$action,$itemId='',$formName='view',$formMethod='get'){
		$configureLoader=self::_helper('configure_loader');
		$host=$configureLoader::help();

		$string='<form method=\''.$host.'\' action=\''.$formAction.'\'>';
		$string.='<input type=\'hidden\' name=\'class\' value=\''.$class.'\' />';
		$string.='<input type=\'hidden\' name=\'action\' value=\''.$action.'\' />';
		$string.='<input type=\'hidden\' name=\'id\' value='.$itemId.' />';

		$string.='<input type=\'submit\' name=\''.$formName.'\' value=\''.$formName.'\' />';

		$string.='</form>';

		return $string;
	}
}
