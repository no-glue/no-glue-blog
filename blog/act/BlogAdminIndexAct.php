<?php

namespace blog\act;

class BlogAdminIndexAct{
	public function index(){}

	public function redirect(
		$class,
		$action,
		$redirect='Redirect',
		$factory='\\useful\\Factory',
		$do='redirect'
	){
		$factory::create($redirect)->$do($class,$action);
	}
}
