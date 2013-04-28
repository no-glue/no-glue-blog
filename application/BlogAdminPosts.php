<?php

namespace application;

use premade;
use application\models;
use application\classes;

class BlogAdminPosts{
	public function __construct(){}

	public function index(){
		require_once('models/DaoCustomiser.php');

		$posts=\application\models\DaoCustomiser::customise(
			\application\models\DaoFactory::create('PostDao'),
			\premade\DatabaseWrapperFactory::create())->getPosts();

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_index.php',
			array('posts'=>$posts)
		);
	}
}

return new \application\BlogAdminPosts();
