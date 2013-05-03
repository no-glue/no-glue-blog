<?php

namespace application;

use application\classes;

class BlogAdminPosts{
	public function __construct(){}

	public function index(){
		require_once('classes/ResultCustomiser.php');
		require_once('classes/DaoWorker.php');

		$posts=\application\classes\ResultCustomiser::customise()
			->setStatement(
				\application\classes\DaoWorker::work(
					'PostDao',
					'getPosts')
			)
			->setWhatVo('PostVo')
			->setVoSetter('PostVoSetter');

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_index.php',
			array('posts'=>$posts)
		);
	}
}

return new \application\BlogAdminPosts();
