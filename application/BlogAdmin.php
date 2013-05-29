<?php

namespace application;

use application\classes;

class BlogAdmin{
	public function __construct(){
		require_once('classes/ClassFactory.php');
		if(!\application\classes\ClassFactory::create('Session')
			->currentUserCan('can_access_admin')){

			\application\classes\ClassFactory::create('Redirect')
				->redirect('blog_admin_index','index');
		}
	}
}
