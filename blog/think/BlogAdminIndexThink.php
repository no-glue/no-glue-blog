<?php

namespace blog\think;

class BlogAdminIndexThink{
	public function __construct(){}

	public function canAccessAdmin(
		$requestType,
		$requestObject,
		$user='UserDao',
		$currentUserCan='can_access_admin',
		$wantedRequestType=\premade\Constants::REQUEST_POST,
		$daoFactory='\\blog\\models\\Factory'
		
	){
		return isset($requestObject->username) AND
			isset($requestObject->password) AND
			$requestType===$wantedRequestType AND 
			$user=$daoFactory::create($user) AND
			$count=$user->login(
				$requestObject->username,
				$requestObject->password
			) AND
			$user->getSession()->currentUserCan('can_access_admin');
	}

	public function loggedOut(
		$user='UserDao',
		$daoFactory='\\blog\\models\\Factory'
	){
		return $daoFactory::create($user)->logout();
	}
}
