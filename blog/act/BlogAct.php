<?php

namespace blog\act;

class BlogAct{
	public function __construct(){}

	public function redirect(
		$class,
		$action,
		$redirect='Redirect',
		$factory='\\useful\\Factory'
	){
		$factory::create(
			$redirect
		)
		->redirect(
			$class,
			$action
		);
	}

	public function show(
		$template,
		$for,
		$pass=array(),
		$view='\\useful\\View'
	){
		$view::load(
			$template,
			$for,
			$pass
		);	
	}

	public function addPost(
		$requestObject,
		$dao='PostDao',
		$vo='PostVo',
		$factoryDao='\blog\models\Factory'
	){
		return $factoryDao::create(
			$dao
		)->save(
			$factoryDao::create(
				$vo
			)
			->setFromObject(
				$requestObject
			)
		);
	}

	public function deletePostById(
		$id,
		$dao='PostDao',
		$factory='\blog\models\Factory'
	){
		$factory::create(
			$dao
		)
		->deletePostById(
			$id
		);
	}

	public function getPosts(
		$result='Result',
		$dao='PostDao',
		$vo='PostVo',
		$factoryResult='\useful\Factory',
		$factoryDao='\blog\models\Factory'
		
	){
		return $factoryResult::create(
			$result
		)
		->setStatement(
			$factoryDao::create(
				$dao
			)
			->getPosts()
		)
		->setWhatVo(
			$vo
		);
	}

	public function updatePost(
		$requestObject,
		$dao='PostDao',
		$vo='PostVo',
		$factoryDao='\blog\models\Factory'
	){
		$factoryDao::create(
			$dao
		)
		->update(
			$factoryDao::create(
				$vo
			)
			->setFromObject(
				$requestObject
			)
		);
	}

	public function getPost(
		$id,
		$result='Result',
		$dao='PostDao',
		$vo='PostVo',
		$factoryResult='\useful\Factory',
		$factoryDao='\blog\models\Factory'
	){
		return $factoryResult::create(
				$result
			)
			->setStatement(
				$factoryDao::create(
					$dao
				)
				->getPostById(
					$id
				)
			)
			->setWhatVo(
				$vo
			)
			->fetch();
	}

	public function deleteUserById(
		$requestObject,
		$userDao='UserDao',
		$factory='\blog\models\Factory'
	){
		return $factory::create($userDao)->deleteUserById(
			$requestObject->id
		);
	}

	public function getUsers(
		$userDao='UserDao',
		$result='Result',
		$factoryDao='\blog\models\Factory',
		$factoryResult='\useful\Factory'
	){
		return $factoryResult::create(
			$result
		)->setStatement(
			$factoryDao::create(
				$userDao
			)
			->getUsers()
		)
		->setWhatVo(
			'UserVo'
		);
	}

	public function updateUser(
	
	){
		\blog\models\Factory::create('UserDao')
			->update(
				\blog\models\Factory::create(
					'UserVo'
				)
				->setFromObject($requestObject)
			);
	}
}
