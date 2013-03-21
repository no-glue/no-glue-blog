<?php

namespace application;

class Index{
	public function __construct(){
	}

	public function index(){
		require_once('views/template.php');
	}
}

return new \application\Index();
