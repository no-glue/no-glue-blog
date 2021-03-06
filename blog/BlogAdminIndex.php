<?php

namespace blog;

class BlogAdminIndex{
	protected $think;

	protected $act;

	public function __construct(
		$think='BlogThink',
		$act='BlogAct',
		$thinkFactory='\\blog\\think\\Factory',
		$actFactory='\\blog\\act\\Factory'
	){
		$this->think=$thinkFactory::create(
			$think
		);

		$this->act=$actFactory::create(
			$act
		);
	}

	public function index($requestType,$requestObject){
		$this->think->evaluate(
			$this->think->canLogin(
				$requestType,
				$requestObject
			),
			$this->think->loggedin(
				$requestObject
			),
			$this->think->canAccessAdmin()) AND
		$this->act->redirect(
			'blog_admin_posts',
			'index'
		);

		$this->act->show(
			'blog_admin_template.php',
			'blog_admin_index_index.php'
		);
	}

	public function logout(){
		$this->think->loggedout() AND
		$this->act->redirect(
			'blog_admin_index',
			'index'
		);
	}
}

return new \blog\BlogAdminIndex();
