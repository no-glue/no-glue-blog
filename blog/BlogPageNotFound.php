<?php

namespace blog;

class BlogPageNotFound{
	public function __construct(){}

	public function index(){
		require_once('views/blog_page_not_found_index.php');
	}
}

return new \blog\BlogPageNotFound();
