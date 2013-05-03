<?php

namespace application;

use premade;
use application\models;
use application\classes;

class BlogAdminPosts{
	public function __construct(){}

	public function index(){
		require_once('classes/ResultFactory.php');
		require_once('premade/DatabaseWrapperFactory.php');
		require_once('models/DaoFactory.php');

		$post=\application\models\DaoFactory::create('PostDao');

		$post->set(\premade\DatabaseWrapperFactory::create());

		$posts=$post->getPosts();

		$result=\application\classes\ResultFactory::create();

		$result->set(
			\premade\DatabaseWrapperFactory::create(),
			$posts,
			'PostVo',
			'PostVoSetter');

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_index.php',
			array('posts'=>$result)
		);
	}
}

return new \application\BlogAdminPosts();
