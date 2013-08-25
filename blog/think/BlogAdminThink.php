<?php

namespace blog\think;

class BlogAdminThink{
	public function __construct(){}

	public function canAccessAdmin(
		$user='UserDao',
		$currentUserCan='can_access_admin',
		$daoFactory='\\blog\\models\\Factory'
		
	){
		return 	$user=$daoFactory::create($user) AND
			$user->getSession()->currentUserCan($currentUserCan);
	}

	public function loggedOut(
		$user='UserDao',
		$daoFactory='\\blog\\models\\Factory'
	){
		return $daoFactory::create($user)->logout();
	}
}
