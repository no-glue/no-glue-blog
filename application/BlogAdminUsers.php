<?php

namespace application;

class BlogAdminUsers{
	public function __construct(){
		require_once('Factory.php');

		\application\Factory::create('BlogAdmin');
	}

	public function index($requestType,$requestObject){
		require_once('premade/Constants.php');
		require_once('models/Factory.php');
		require_once('classes/Factory.php');

		$userDao=\application\models\Factory::create('UserDao');

		$requestType===\premade\Constants::REQUEST_POST AND
		\application\models\Factory::create('UserValidate')
			->validateDelete($requestObject) AND
		$userDao->deleteUserById($requestObject->id);

		$users=\application\classes\Factory::create('Result')
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
		require_once('models/Factory.php');
		require_once('classes/Factory.php');

		$requestType===\premade\Constants::REQUEST_POST AND
		\application\models\Factory::create('UserDao')
			->update(
				\application\models\Factory::create(
					'UserVo'
				)
				->setFromObject($requestObject)
			);

		$user=\application\classes\Factory::create('Result')
			->setStatement(
				\application\models\Factory::create(
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
		require_once('premade/Constants.php');
		require_once('models/Factory.php');
		require_once('classes/View.php');

		$requestType===\premade\Constants::REQUEST_POST AND
		\application\models\Factory::create('UserDao')->save(
			\application\models\Factory::create('UserVo')
				->setFromObject($requestObject)
		);

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_users_add.php'
		);
	}
}

return new \application\BlogAdminUsers();
