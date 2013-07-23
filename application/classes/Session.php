<?php

namespace application\classes;

require_once('premade/Constants.php');
require_once('premade/Statics.php');

use premade;

class Session{
	public function __construct(){}

	public function login(
		$userLevel,
		$accessRights=array()
	){
		$accessRights=array_merge(
				$accessRights,
				\premade\Statics::$accessRights
		);

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

	public static function another($redirect='SessionDatabase'){
		return $redirect;
	}
}
