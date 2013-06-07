<?php

namespace application;

class BlogAdminUsers{
	public function __construct(){
		require_once('Factory.php');

		\application\Factory::create('BlogAdmin');
	}

	public function index($requestType,$reuestObject){
		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_users_index.php'
		);
	}
}

return new \application\BlogAdminUsers();
