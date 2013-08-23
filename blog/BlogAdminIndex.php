<?php

namespace blog;

class BlogAdminIndex{
	protected $think;
	protected $act;

	public function __construct(
		$think='BlogAdminIndexThink',
		$thinkFactory='\\blog\\think\\Factory',
		$act='BlogAdminIndexAct',
		$actFactory='\\blog\\act\\Factory'
	){
		$this->think=$thinkFactory::create($think);
		$this->act=$actFactory::create($act);
	}

	public function index($requestType,$requestObject){
		$this->think->canAccessAdmin(
			$requestType,
			$requestObject
		) AND
		$this->act->redirect('blog_admin_posts','index');

		$this->act->show(
			'blog_admin_template.php',
			'blog_admin_index_index.php'
		);
	}

	public function logout(){
		$this->think->loggedOut() AND
		$this->act->redirect('blog_admin_index','index');
	}
}

return new \blog\BlogAdminIndex();
