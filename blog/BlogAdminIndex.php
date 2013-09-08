<?php

namespace blog;

class BlogAdminIndex{
	protected $helper;

	public function __construct(
		$helper='BlogAdminHelper',
		$factory='\\blog\\Factory'
	){
		$this->helper=
			$factory::create($helper)
			->setup(
				get_class($this)
			);
	}

	public function index($requestType,$requestObject){
		$this->helper->think
			->canLogin($requestType,$requestObject)
			->loggedin($requestObject)
			->canAccessAdmin() AND
		$this->helper->act->redirect('blog_admin_posts','index');

		$this->helper->act->show(
			'blog_admin_template.php',
			'blog_admin_index_index.php'
		);
	}

	public function logout(){
		$this->helper->think->loggedout() AND
		$this->helper->act->redirect('blog_admin_index','index');
	}
}

return new \blog\BlogAdminIndex();
