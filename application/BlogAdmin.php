<?php

namespace application;

use application\classes;

class BlogAdmin{
	public function __construct(){
		require_once('models/Factory.php');
		if(!\application\models\Factory::create('UserDao')
			->getSession()->currentUserCan('can_access_admin')){

			\useful\Factory::create('Redirect')
				->redirect('blog_admin_index','index');
		}
	}
}
