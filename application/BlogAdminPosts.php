<?php

namespace application;

use application\classes;
use application\models;

class BlogAdminPosts{
	public function __construct(){}

	public function index(){
		require_once('classes/ClassFactory.php');
		require_once('models/DaoFactory.php');

		$posts=\application\classes\ClassFactory::create('Result')
			->setStatement(
				\application\models\DaoFactory::create(
					'PostDao'
				)
					->getPosts()
			)
			->setWhatVo('PostVo')
			->setVoSetter('PostVoSetter');

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_index.php',
			array('posts'=>$posts)
		);
	}

	public function view($postId){
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
			->setVoSetter('PostVoSetter')
			->fetch();

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_view.php',
			array('post'=>$post)
		);
	}
}

return new \application\BlogAdminPosts();
