<?php

namespace blog;

class BlogAdminUsers{
	public function __construct(
		$think='BlogThink',
		$act='BlogAct',
		$thinkFactory='\\blog\\think\\Factory',
		$actFactory='\\blog\\act\\Factory'
	){
		$this->think=$thinkFactory::create(
			$think
		);

		$this->act=$actFactory::create(
			$act
		);

		!$this->think->trip(
			'canAccessAdmin'
		) AND
		$this->act->redirect(
			'blog_admin_index',
			'index'
		);
	}

	public function index(
		$requestType,
		$requestObject
	){
		$this->think->trip(
			'isPost',
			$requestType
		) AND
		$this->act->deleteUserById(
			$requestObject->id
		);

		$this->act->show(
			'blog_admin_template.php',
			'blog_admin_users_index.php,
			array(
				'users'=>$this->act->getUsers()
			)
		);
	}

	public function view(
		$requestType,
		$requestObject
	){
		$this->think->trip(
			'isPost',
			$requestType
		) AND
		\blog\models\Factory::create('UserDao')
			->update(
				\blog\models\Factory::create(
					'UserVo'
				)
				->setFromObject($requestObject)
			);

		$user=\useful\Factory::create('Result')
			->setStatement(
				\blog\models\Factory::create(
					'UserDao'
				)
				->getUserById($requestObject->id)
			)
			->setWhatVo('UserVo')
			->fetch();

		\useful\View::load('blog_admin_template.php',
			'blog_admin_users_view.php',
			array('user'=>$user)
		);
	}

	public function add($requestType,$requestObject){
		$requestType===\premade\Constants::REQUEST_POST AND
		\blog\models\Factory::create('UserDao')->save(
			\blog\models\Factory::create('UserVo')
				->setFromObject($requestObject)
		);

		\useful\View::load('blog_admin_template.php',
			'blog_admin_users_add.php'
		);
	}
}

return new \blog\BlogAdminUsers();
