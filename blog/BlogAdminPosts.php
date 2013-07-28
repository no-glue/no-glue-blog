<?php

namespace blog;

class BlogAdminPosts{
	public function __construct(){
		\blog\Factory::create('BlogAdmin');
	}

	public function index($requestType,$requestObject){
		$postDao=\blog\models\Factory::create('PostDao');

		$requestType===\premade\Constants::REQUEST_POST AND
		\blog\models\Factory::create('PostValidate')
			->validateDelete($requestObject) AND
		$postDao->deletePostById($requestObject->id);

		$posts=\useful\Factory::create('Result')
			->setStatement($postDao->getPosts())
			->setWhatVo('PostVo');

		\useful\View::load('blog_admin_template.php',
			'blog_admin_posts_index.php',
			array('posts'=>$posts)
		);
	}

	public function view($requestType,$requestObject){
		$requestType===\premade\Constants::REQUEST_POST AND
		\blog\models\Factory::create('PostValidate')
			->validateUpdate($requestObject) AND
		\blog\models\Factory::create('PostDao')
			->update(
				\blog\models\Factory::create(
					'PostVo'
				)
				->setFromObject($requestObject)
			);

		$post=\useful\Factory::create('Result')
			->setStatement(
				\blog\models\Factory::create(
					'PostDao'
				)
				->getPostById($requestObject->id)
			)
			->setWhatVo('PostVo')
			->fetch();

		\useful\View::load('blog_admin_template.php',
			'blog_admin_posts_view.php',
			array('post'=>$post)
		);
	}

	public function add($requestType,$requestObject){
		$requestType===\premade\Constants::REQUEST_POST AND
		\blog\models\Factory::create('PostDao')->save(
			\blog\models\Factory::create('PostVo')
				->setFromObject($requestObject)
		);

		\useful\View::load('blog_admin_template.php',
			'blog_admin_posts_add.php'
		);
	}
}

return new \blog\BlogAdminPosts();
