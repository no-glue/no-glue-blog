<?php

namespace application;

class BlogAdminUsers{
	public function __construct(){
		require_once('Factory.php');

		\application\Factory::create('BlogAdmin');
	}

	public function index($requestType,$reuestObject){
		exit('users');
	}
}

return new \application\BlogAdminUsers();
