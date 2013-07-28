<?php

namespace application;

class BlogAdminUsers{
	public function __construct(){
		\application\Factory::create('BlogAdmin');
	}

	public function index($requestType,$requestObject){
		$userDao=\application\models\Factory::create('UserDao');

		$requestType===\premade\Constants::REQUEST_POST AND
		\application\models\Factory::create('UserValidate')
			->validateDelete($requestObject) AND
		$userDao->deleteUserById($requestObject->id);

		$users=\useful\Factory::create('Result')
			->setStatement($userDao->getUsers())
			->setWhatVo('UserVo');

		\useful\View::load('blog_admin_template.php',
			'blog_admin_users_index.php',
			array('users'=>$users)
		);
	}

	public function view($requestType,$requestObject){
		$requestType===\premade\Constants::REQUEST_POST AND
		\application\models\Factory::create('UserDao')
			->update(
				\application\models\Factory::create(
					'UserVo'
				)
				->setFromObject($requestObject)
			);

		$user=\useful\Factory::create('Result')
			->setStatement(
				\application\models\Factory::create(
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
		\application\models\Factory::create('UserDao')->save(
			\application\models\Factory::create('UserVo')
				->setFromObject($requestObject)
		);

		\useful\View::load('blog_admin_template.php',
			'blog_admin_users_add.php'
		);
	}
}

return new \application\BlogAdminUsers();
