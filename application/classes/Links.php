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

	public function lineForm($class,$action,$formName='view',$formMethod='get',$itemId=''){
		$configureLoader=self::_helper('configure_loader');
		$host=$configureLoader::help();

		$formAction=$host.'?class='.$class.'&action='.$action;

		$formMethod=(string)$formMethod;

		$formMethod==='get' AND 
		$formAction.='&id='.$itemId;

		$string='<form method=\''.$formMethod.'\' action=\''.$formAction.'\'>';
		$formMethod==='post' AND 
		$string.='<input type=\'hidden\' name=\'id\' value='.$itemId.' />';

		$string.='<button type=\'submit\' name=\''.$formName.'\'>'.ucfirst($formName).'</button>';

		$string.='</form>';

		return $string;
	}
}
