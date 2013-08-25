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
}
