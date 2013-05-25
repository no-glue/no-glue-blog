<?php

namespace application\models;

class PostValidate{
	public function __construct(){}

	public function validateDelete($requestObject){
		return isset($requestObject->id) AND
			is_numeric($requestObject->id);
	}

	public function validateUpdate($requestObject){
		return TRUE;
	}
}
