<?php

namespace application;

use premade;
use application\models;
use application\classes;

class BlogAdminIndex{
	public function __construct(){}

	public function index($requestType,$requestObject){
		require_once('premade/Constants.php');
		require_once('models/ModelFactory.php');
		require_once('classes/View.php');

		$requestType===\premade\Constants::REQUEST_POST AND
		$count=\application\models\ModelFactory::create('UserDao')
			->login(
				$requestObject->username,
				$requestObject->password
			) AND
		\application\classes\Factory::create('Session')
			->currentUserCan('can_access_admin') AND
		\application\classes\Factory::create('Redirect')
			->redirect('blog_admin_posts','index');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_index_index.php'
		);
	}

	public function logout(){
		require_once('models/ModelFactory.php');
		require_once('classes/Factory.php');

		\application\models\ModelFactory::create('UserDao')
			->logout() AND
		\application\classes\Factory::create('Redirect')
			->redirect('blog_admin_index','index');
	}
}

return new \application\BlogAdminIndex();
