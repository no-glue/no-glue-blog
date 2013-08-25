<?php

namespace blog\think;

class BlogAdminIndexThink{
	public function __construct(){}

	public function canLogin(
		$requestType,
		$requestObject,
		$wantedRequestType=\premade\Constants::REQUEST_POST
	){
		$result=NULL;

		isset($requestObject->username) AND
		isset($requestObject->password) AND
		$requestType===$wantedRequestType AND
		$result=$this;

		return $result; 
	}

	public function canAccessAdmin(
		$user='UserDao',
		$currentUserCan='can_access_admin',
		$daoFactory='\\blog\\models\\Factory'
		
	){
		$result=NULL;

		$user=$daoFactory::create($user) AND
		$user->getSession()->currentUserCan($currentUserCan) AND
		$result=$this;

		return $result;
	}

	public function loggedout(
		$user='UserDao',
		$daoFactory='\\blog\\models\\Factory'
	){
		$result=NULL;

		$daoFactory::create($user)->logout() AND
		$result=$this;

		return $this;
	}
}
