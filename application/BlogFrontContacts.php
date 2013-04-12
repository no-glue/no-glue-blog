<?php

namespace application;

use application\classes;

class BlogFrontContacts{
	public function __construct(){}

	public function index(){
		require_once('classes/View.php');

		\application\classes\View::load('blog_front_template.php',
			'blog_front_contacts_index.php'
		);
	}
}

return new \application\BlogFrontContacts();
