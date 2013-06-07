<?php

namespace application;

class BlogAdminUsers{
	public function __construct(){
		require_once('Factory.php');

		\application\Factory::create('BlogAdmin');
	}

	public function index($requestType,$reuestObject){
		require_once('models/ModelFactory.php');
		require_once('classes/ClassFactory.php');

		$userDao=\application\models\ModelFactory::create('UserDao');

		$users=\application\classes\ClassFactory::create('Result')
			->setStatement($userDao->getUsers())
			->setWhatVo('UserVo');

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_users_index.php',
			array('users'=>$users)
		);
	}
}

return new \application\BlogAdminUsers();
