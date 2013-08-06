<?php

namespace blog;

class BlogFrontIndex{
	public function __construct(){}

	public function index($requestType,$requestObject){
		$postDao=\blog\models\Factory::create('PostDao');

		$posts=\useful\Factory::create('Result')
			->setStatement($postDao->getPosts())
			->setWhatVo('PostVo');

		\useful\View::load('blog_front_template.php',
			'blog_front_index_index.php',
			array('posts'=>$posts)
		);
	}

	public function more($requestType,$requestObject){
		$post=\useful\Factory::create('Result')
			->setStatement(
				\blog\models\Factory::create(
					'PostDao'
				)
				->getPostById($requestObject->id)
			)
			->setWhatVo('PostVo')
			->fetch();

		\useful\View::load('blog_front_template.php',
			'blog_front_index_more.php',
			array('post'=>$post)
		);
	}
}

return new \blog\BlogFrontIndex();
