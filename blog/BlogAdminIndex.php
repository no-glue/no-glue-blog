<?php

namespace blog;

class BlogAdminIndex{
	public function __construct(){}

	public function index($requestType,$requestObject){
		$requestType===\premade\Constants::REQUEST_POST AND
		$user=\blog\models\Factory::create('UserDao') AND
		$count=$user->login(
			$requestObject->username,
			$requestObject->password
		) AND
		$user->getSession()->currentUserCan('can_access_admin') AND
		\useful\Factory::create('Redirect')
			->redirect('blog_admin_posts','index');

		\useful\View::load('blog_admin_template.php',
			'blog_admin_index_index.php'
		);
	}

	public function logout(){
		\blog\models\Factory::create('UserDao')
			->logout() AND
		\useful\Factory::create('Redirect')
			->redirect('blog_admin_index','index');
	}
}

return new \blog\BlogAdminIndex();
