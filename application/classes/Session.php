<?php

namespace application\classes;

class Session{
	public function __construct(){}

	public function login($userLevel){
		require_once('ConfigureLoader.php');

		$accessRights=ConfigureLoader::help('configure/','accessRights.php');

		session_start();
	
		$_SESSION['access_rights']=
			array_slice($accessRights,$userLevel);

		session_regenerate_id();
	}
}
