<?php

namespace blog;

class BlogAdmin{
	protected $think;

	protected $act;

	protected $handler;

	public function __construct(
		$think='BlogThink',
		$thinkFactory='\\blog\\think\\Factory',
		$act='BlogAdminAct',
		$actFactory='\\blog\\act\\Factory',
		$handler='\\blog\\handlers\\BlogHandler'
	){
		$this->think=$thinkFactory::create($think);

		$this->act=$actFactory::create($act);

		$this->handler=new $handler;

		!$this->think->canAccessAdmin() AND
		$this->act->redirect('blog_admin_index','index');
	}
}
