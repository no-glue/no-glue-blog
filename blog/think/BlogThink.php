<?php

namespace blog\think;

class BlogThink{

	public function __construct(){}

	public function canAccessAdmin(
		$user='UserDao',
		$currentUserCan='can_access_admin',
		$daoFactory='\\blog\\models\\Factory'
		
	){
		return function() use (
			$user,
			$currentUserCan,
			$daoFactory
		) {
			return $user=$daoFactory::create(
				$user
			) AND
			$user->getSession()->currentUserCan(
				$currentUserCan
			);
		};
	}

	public function canLogin(
		$requestType,
		$requestObject,
		$wantedRequestType=\premade\Constants::REQUEST_POST
	){
		return function() use (
			$requestType,
			$requestObject,
			$wantedRequestType
		) {
			return isset(
				$requestObject->username
			) AND
			isset(
				$requestObject->password
			) AND
			$requestType===$wantedRequestType;
		};
	}

	public function loggedin(
		$requestObject,
		$user='UserDao',
		$daoFactory='\\blog\\models\\Factory'
	){
		return function() use (
			$requestObject,
			$user,
			$daoFactory
		) {
			return $user=$daoFactory::create(
				$user
			) AND
			$user->login(
				$requestObject->username,
				$requestObject->password
			);
		};
	}

	public function loggedout(
		$user='UserDao',
		$daoFactory='\\blog\\models\\Factory'
	){
		return function() use (
			$user,
			$daoFactory
		) {
			return $daoFactory::create(
				$user
			)->logout();
		};
	}

	public function isPost(
		$requestType,
		$post=\premade\Constants::REQUEST_POST
	){
		return function() use (
			$requestType,
			$post
		) {
			return $requestType===$post;
		};
	}

	public function evaluate(){
		$args=func_get_args();

		$result=TRUE;

		foreach($args as $arg) {
			$result=$result&&$arg();
			
			if(!$result){
				return $result;
			}
		}

		return $result;
	}
}
