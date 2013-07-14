<?php

namespace application\classes;

require_once('premade/Constants.php');

use premade;

class SessionFile{
	public function login(
		$userLevel,
		$accessRights=\premade\Constants::ACCESS_RIGHTS
	){
		session_start();
	
		$_SESSION['access_rights']=
			array_slice($accessRights,$userLevel);

		session_regenerate_id();
	}

	public function logout(){
		session_start();

		unset($_SESSION['access_rights']);

		return TRUE;
	}

	public function currentUserCan($right){
		session_start();

		return isset($_SESSION['access_rights']) AND
			in_array($right,$_SESSION['access_rights']);
	}
}
