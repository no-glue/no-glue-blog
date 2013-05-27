<?php

namespace application;

use premade;
use application\models;
use application\classes;

class BlogAdminIndex{
	public function __construct(){}

	public function index($requestType,$requestObject){
		require_once('premade/Constants.php');
		require_once('models/ModelFactory.php');
		require_once('classes/View.php');

		$requestType===\premade\Constants::REQUEST_POST AND
		$user=\application\models\ModelFactory::create('UserDao')
			->login(
				$requestObject->username,
				$requestObject->password
			);

		if(isset($user)){exit('<pre>'.print_r($user,true).'</pre>');}

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_index_index.php'
		);
	}
}

return new \application\BlogAdminIndex();
