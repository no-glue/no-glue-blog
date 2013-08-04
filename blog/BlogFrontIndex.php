<?php

namespace blog;

class BlogFrontIndex{
	public function __construct(){}

	public function index($requestType,$requestObject){
		$postDao=\blog\models\Factory::create('PostDao');

		$posts=\useful\Factory::create('Result')
			->setStatement($postDao->getPosts())
			->setWhatVo('PostVo');

		\useful\View::load('blog_admin_template.php',
			'blog_front_index_index.php',
			array('posts'=>$posts)
		);
	}
}

return new \blog\BlogFrontIndex();
