<?php

namespace application;

use application\classes;

class BlogAdminPosts{
	public function __construct(){}

	public function index(){
		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_index.php'
		);
	}
}

return new \application\BlogAdminPosts();
