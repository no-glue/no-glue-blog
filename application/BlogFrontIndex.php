<?php

namespace application;

use application\classes;

class BlogFrontIndex{
	public function __construct(){}

	public function index(){
		require_once('classes/View.php');

		\application\classes\View::load('blog_front_template.php',
			'blog_front_index_index.php'
		);
	}
}

return new \application\BlogFrontIndex();
