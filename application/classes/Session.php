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

	public function currentUserCan($right){
		session_start();

		return isset($_SESSION['access_rights']) AND
			in_array($right,$_SESSION['access_rights']);
	}
}
