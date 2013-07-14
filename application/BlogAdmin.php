<?php

namespace application;

use application\classes;

class BlogAdmin{
	public function __construct(){
		require_once('classes/Factory.php');
		if(!\application\classes\Factory::create('Session')
			->currentUserCan('can_access_admin')){

			\application\classes\Factory::create('Redirect')
				->redirect('blog_admin_index','index');
		}
	}
}
