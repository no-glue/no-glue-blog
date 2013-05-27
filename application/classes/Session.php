<?php

namespace application\models;

class Session{
	public function __construct(){}

	public function login($userLevel){
		session_start();
	
		$_SESSION['access_rights']='can_access_admin';

		session_regenerate_id();
	}
}
