<?php

namespace application;

class PageNotFound{
	public function __construct(){}

	public function index(){
		require_once('views/page.not.found_index.php');
	}
}

return new \application\PageNotFound();
