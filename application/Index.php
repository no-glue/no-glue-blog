<?php

namespace application;

require_once('models/PostDao.php');

class Index{
	protected $_postDao;

	public function __construct($postDao){
		$this->_postDao=$postDao;
	}

	public function index(){
		require_once('views/index_index.php');
	}

	public function testParams($paramFirst){
		var_dump($paramFirst);
	}
}

return new \application\Index(new \application\PostDao(new \application\PostVo()));
