<?php

namespace blog\act;

class BlogAdminIndexAct{
	public function index(){}

	public function login(
		$requestObject,
		$user='UserDao',
		$daoFactory='\\blog\\models\\Factory'
	){
		return $user=$daoFactory::create($user) AND
		$user->login(
			$requestObject->username,
			$requestObject->password
		);
	}

	public function redirect(
		$class,
		$action,
		$redirect='Redirect',
		$factory='\\useful\\Factory',
		$do='redirect'
	){
		call_user_func_array(
			array($factory::create($redirect),$do),
			array($class,$action)
		);
	}

	public function show(
		$template,
		$for,
		$view='\\useful\\View',
		$action='load'
	){
		$view::$action($template,$for);	
	}
}
