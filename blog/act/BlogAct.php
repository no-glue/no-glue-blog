<?php

namespace blog\act;

class BlogAct{
	public function __construct(){}

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
		$pass=array(),
		$view='\\useful\\View'
	){
		$view::load($template,$for,$pass);	
	}

	public function deletePostById(
		$id,
		$dao='PostDao',
		$factory='\blog\models\Factory'
	){
		$factory::create($dao)->deletePostById($id);
	}

	public function getPosts(
		$result='Result',
		$dao='PostDao',
		$vo='PostVo',
		$factoryResult='\useful\Factory',
		$factoryDao='\blog\models\Factory'
		
	){
		return $factoryResult::create($result)
			->setStatement(
				$factoryDao::create($dao)->getPosts()
			)
			->setWhatVo($vo);
	}
}
