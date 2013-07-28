<?php

namespace application;

class BlogAdmin{
	public function __construct(){
		if(!\application\models\Factory::create('UserDao')
			->getSession()->currentUserCan('can_access_admin')){

			\useful\Factory::create('Redirect')
				->redirect('blog_admin_index','index');
		}
	}
}
