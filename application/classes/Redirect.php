<?php

namespace application\classes;

require_once('ConfigureLoader.php');

class Redirect{
	public function __construct(){}

	protected static function _helper($helper,$helpers=array(
		'configure_loader'=>'\application\classes\ConfigureLoader')){
		return $helpers[$helper];
	}

	public function redirect($class,$action,$params=array()){
		$configureLoader=self::_helper('configure_loader');
		$host=$configureLoader::help()['host'];

		$query=http_build_query(
				array_merge(
					array(
						'class'=>$class,
						'action'=>$action
					),
				$params
			));

		$host.='?'.$query;

		header('Location:'.$host);
		
		exit();
	}
}
