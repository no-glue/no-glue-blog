<?php

namespace blog;

class BlogAdmin{
	public function __construct(){
		if(!\blog\models\Factory::create('UserDao')
			->getSession()->currentUserCan('can_access_admin')){

			\useful\Factory::create('Redirect')
				->redirect('blog_admin_index','index');
		}
	}
}
