<?php

namespace blog\think;

class BlogThink{

	public function __construct(){}

	public function canAccessAdmin(
		$message='think',
		$user='UserDao',
		$currentUserCan='can_access_admin',
		$daoFactory='\\blog\\models\\Factory'
		
	){
		$result=NULL;

		$user=$daoFactory::create($user) AND
		$user->getSession()->currentUserCan($currentUserCan) AND
		$result=$this;
		
		if(!$result){
			throw new \Exception($message);
		}

		return $result;
	}

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

		if(!$result){
			throw new \Exception('think');
		}

		return $result; 
	}

	public function loggedin(
		$requestObject,
		$user='UserDao',
		$daoFactory='\\blog\\models\\Factory'
	){
		$result=NULL;

		$user=$daoFactory::create($user) AND
		$user->login(
			$requestObject->username,
			$requestObject->password
		) AND
		$result=$this;

		if(!$result){
			throw new \Exception('think');
		}

		return $result;
	}

	public function loggedout(
		$user='UserDao',
		$daoFactory='\\blog\\models\\Factory'
	){
		$result=NULL;

		$daoFactory::create($user)->logout() AND
		$result=$this;

		if(!$result){
			throw new \Exception('think');
		}

		return $result;
	}

	public function isPost(
		$requestType,
		$message='think',
		$post=\premade\Constants::REQUEST_POST
	){
		// isPost
		// checks whether request is post
		//
		// @param string requestType
		// @param string message message to throw
		// @param string post request type
		//
		// @return mixed result if all ok

		$result=NULL;

		$requestType===$post AND
		$result=$this;

		if(!$result){
			throw new \Exception($message);
		}
		
		return $result;
	}
}
