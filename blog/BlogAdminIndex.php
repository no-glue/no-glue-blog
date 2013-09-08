<?php

namespace blog;

class BlogAdminIndex{
	public function __construct(
		$think='BlogThink',
		$thinkChild='BlogAdminIndexThink',
		$act='BlogAdminIndexAct',
		$thinkFactory='\\blog\\think\\Factory',
		$actFactory='\\blog\\act\\Factory'
	){}

	public function index($requestType,$requestObject){
		$this->think->canLogin($requestType,$requestObject)
			->loggedin($requestObject)
			->canAccessAdmin() AND
		$this->act->redirect('blog_admin_posts','index');

		$this->act->show(
			'blog_admin_template.php',
			'blog_admin_index_index.php'
		);
	}

	public function logout(){
		$this->think->loggedout() AND
		$this->act->redirect('blog_admin_index','index');
	}
}

return new \blog\BlogAdminIndex();
