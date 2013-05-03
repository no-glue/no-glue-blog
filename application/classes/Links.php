<?php

namespace application\classes;

require_once('ConfigureLoader.php');

class Links{
	protected static function _helper($helper,$helpers=array(
		'configure_loader'=>'\application\classes\ConfigureLoader')){
		return $helpers[$helper];
	}

	public function link($class,$action,$text,$parameters=array(),$host=''){
		$configureLoader=self::_helper('configure_loader');
		$host=(string)$host;
		($host==='') AND $host=$configureLoader::help();

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
}
