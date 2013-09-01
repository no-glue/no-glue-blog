<?php

namespace blog\handlers;

class BlogHandler{
	public function __construct(){
		set_exception_handler(array($this,'handle'));
	}

	public function handle($exception){
		exit($exception->getMessage());
	}
}
