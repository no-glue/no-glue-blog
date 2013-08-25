<?php

namespace blog\act;

class BlogAdminAct{
	public function index(){}

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