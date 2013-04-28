<?php

namespace application;

use premade;
use application\models;
use application\classes;

class BlogAdminPosts{
	public function __construct(){}

	public function index(){
		require_once('classes/ResultCustomiser.php');
		require_once('models/DaoCustomiser.php');
		require_once('premade/DatabaseWrapperFactory.php');

		$posts=\application\classes\ResultCustomiser::customise(
			\premade\DatabaseWrapperFactory::create(),
			\application\models\DaoCustomiser::customise(
				\premade\DatabaseWrapperFactory::create(),
				'PostDao')->getPosts(),
			'PostVo');

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_index.php',
			array('posts'=>$posts)
		);
	}
}

return new \application\BlogAdminPosts();
