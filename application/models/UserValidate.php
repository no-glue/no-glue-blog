<?php

namespace application\models;

class UserValidate{
	public function __construct(){}

	public function validateDelete($requestObject){
		return isset($requestObject->id) AND
			is_numeric($requestObject->id);
	}
}
