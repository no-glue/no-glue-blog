<?php

namespace application;

class Index{
	public function __construct(){}

	public function index(){
		$values=(Object)array(
			'css'=>array(
				'main'=>'<link href=\'application/assets/css/sensiblecode.css\' type=\'text/css\' rel=\'stylesheet\' />'
			),
			'subviews'=>array(
				'header'=>array(
					'site_title'=>'front_site_title.php',
					'site_description'=>'front_site_description.php'
				),
				'menu'=>'front_menu_logged_out.php',
				'body'=>'front_about_me.php'
			)
		);

		require_once('views/template.php');
	}

	public function testParams($paramFirst){
		var_dump($paramFirst);
	}
}

return new \application\Index();
