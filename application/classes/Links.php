<?php

namespace application\classes;

require_once('ConfigureLoader.php');

class Links{
	public static function link($class,$action,$text,$parameters=array(),$host='',$helper='config_loader'){
		$helper=self::_helper($helper);
		$host=(string)$host;
		$host=($host==='')?$helper::help():$host;

		$result='<a href=\''.$host.'?class='.$class.'&action='.$action;

		foreach($parameters as $parameter=>$value){
			$result.='&'.$parameter.'='.$value;
		}

		$result.='\'>';
		$result.=$text;
		$result.='</a>';

		return $result;
	}

	public static function css($location,$type='text/css',$rel='stylesheet'){
		return '<link href=\''.$location.'\' type=\''.$type.'\' rel=\''.$rel.'\'/>';
	}

	protected static function _helper($helper,$helpers=array(
		'config_loader'=>'\application\classes\ConfigureLoader')){
		return $helpers[$helper];
	}
}
