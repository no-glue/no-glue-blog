<?php

namespace blog;

class BlogAdminIndex{
	protected $think;

	protected $act;

	public function __construct(
		$think='BlogThink',
		$act='BlogAct',
		$exceptionHandler='handle',
		$thinkFactory='\\blog\\think\\Factory',
		$actFactory='\\blog\\act\\Factory'
	){
		$this->think=$thinkFactory::create($think);

		$this->act=$actFactory::create($act);

		set_exception_handler(array($this,$exceptionHandler));
	}

	public function index($requestType,$requestObject){
		$this->think
			->canLogin($requestType,$requestObject)
			->loggedin($requestObject)
			->canAccessAdmin() AND
		$this->act->redirect('blog_admin_posts','index');
	}

	public function logout(){
		$this->think->loggedout() AND
		$this->act->redirect('blog_admin_index','index');
	}

	public function handle($exception){
		$this->act->show(
			'blog_admin_template.php',
			'blog_admin_index_index.php'
		);
	}
}

return new \blog\BlogAdminIndex();
