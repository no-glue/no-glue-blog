<?php

namespace application;

use premade;
use application\classes;
use application\models;

class BlogAdminPosts{
	public function __construct(){}

	public function index($requestType,$id){
		require_once('premade/Constants.php');
		require_once('classes/ClassFactory.php');
		require_once('models/DaoFactory.php');

		$postDao=\application\models\DaoFactory::create('PostDao');

		$requestType===\premade\Constants::REQUEST_POST AND
		$postDao->deletePostById($id);

		$posts=\application\classes\ClassFactory::create('Result')
			->setStatement($postDao->getPosts())
			->setWhatVo('PostVo');

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_index.php',
			array('posts'=>$posts)
		);
	}

	public function view($requestType,$postId){
		require_once('classes/ClassFactory.php');
		require_once('models/DaoFactory.php');

		$post=\application\classes\ClassFactory::create('Result')
			->setStatement(
				\application\models\DaoFactory::create(
					'PostDao'
				)
				->getPostById($postId)
			)
			->setWhatVo('PostVo')
			->fetch();

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_view.php',
			array('post'=>$post)
		);
	}
}

return new \application\BlogAdminPosts();
