<?php

namespace application;

use application\classes;

class BlogFrontIndex{
	public function __construct(){}

	public function index(){
		$values=(Object)array(
			'css'=>array(
				'main'=>array(
					'location'=>'application/assets/css/sensiblecode.css',
					'type'=>'text/css',
					'rel'=>'stylesheet'
				)
			),
			'subviews'=>array(
				'header'=>array(
					'blog_front_title'=>'blog_front_title.php',
					'blog_front_description'=>'blog_front_description.php'
				),
				'blog_front_menu'=>'blog_front_menu_logged_out.php',
				'blog_front_body'=>'blog_front_about_me.php'
			)
		);

		require_once('classes/Links.php');

		require_once('views/blog_front_template.php');
	}

	public function testParams($paramFirst){
		var_dump($paramFirst);
	}
}

return new \application\BlogFrontIndex();
