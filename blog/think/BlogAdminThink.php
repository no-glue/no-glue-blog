<?php

namespace blog\think;

class BlogAdminThink{
	public function __construct(){}

	public function loggedOut(
		$user='UserDao',
		$daoFactory='\\blog\\models\\Factory'
	){
		return $daoFactory::create($user)->logout();
	}
}
