<?php

namespace application;

class Index{
	public function __construct(){
	}

	public function index(){
		require_once('views/index_index.php');
	}
}

return new \application\Index();
