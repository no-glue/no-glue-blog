<?php

namespace blog;

class BlogAdmin{
	protected $think;
	protected $act;
	public function __construct(
		$think='BlogAdminThink',
		$thinkFactory='\\blog\\think\\Factory',
		$act='BlogAdminAct',
		$actFactory='\\blog\\act\\Factory'
	){
		$this->think=$thinkFactory::create($think);

		$this->act=$actFactory::create($act);

		!$this->think->canAccessAdmin() AND
		$this->act->redirect('blog_admin_index','index');
	}
}
