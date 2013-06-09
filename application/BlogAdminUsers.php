<?php

namespace application;

class BlogAdminUsers{
	public function __construct(){
		require_once('Factory.php');

		\application\Factory::create('BlogAdmin');
	}

	public function index($requestType,$requestObject){
		require_once('premade/Constants.php');
		require_once('models/ModelFactory.php');
		require_once('classes/ClassFactory.php');

		$userDao=\application\models\ModelFactory::create('UserDao');

		$requestType===\premade\Constants::REQUEST_POST AND
		\application\models\ModelFactory::create('UserValidate')
			->validateDelete($requestObject) AND
		$userDao->deleteUserById($requestObject->id);

		$users=\application\classes\ClassFactory::create('Result')
			->setStatement($userDao->getUsers())
			->setWhatVo('UserVo');

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_users_index.php',
			array('users'=>$users)
		);
	}

	public function view($requestType,$requestObject){
		require_once('premade/Constants.php');
		require_once('models/ModelFactory.php');
		require_once('classes/ClassFactory.php');

		$requestType===\premade\Constants::REQUEST_POST AND
		\application\models\ModelFactory::create('UserDao')
			->update(
				\application\models\ModelFactory::create(
					'UserVo'
				)
				->setFromObject($requestObject)
			);

		$user=\application\classes\ClassFactory::create('Result')
			->setStatement(
				\application\models\ModelFactory::create(
					'UserDao'
				)
				->getUserById($requestObject->id)
			)
			->setWhatVo('UserVo')
			->fetch();

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_users_view.php',
			array('user'=>$user)
		);
	}

	public function add($requestType,$requestObject){
		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_users_add.php'
		);
	}
}

return new \application\BlogAdminUsers();
