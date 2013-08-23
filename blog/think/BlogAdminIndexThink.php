<?php

namespace blog\think;

class BlogAdminIndexThink{
	public function __construct(){}

	public function canAccessAdmin(
		$requestType,
		$username,
		$password,
		$user='UserDao',
		$currentUserCan='can_access_admin',
		$wantedRequestType=\premade\Constants::REQUEST_POST,
		$daoFactory='\\blog\\models\\Factory'
		
	){
		return $requestType===$wantedRequestType AND 
			$user=$daoFactory::create($user) AND
			$count=$user->login(
				$username,
				$password
			) AND
			$user->getSession()->currentUserCan('can_access_admin');
	}
}
