<?php

namespace application;

class Index{
	public function __construct(){
	}

	public function index(){
		require_once('views/index_index.php');
	}

	public function test($paramFirst){
		var_dump($paramFirst);
	}
}

return new \application\Index();
