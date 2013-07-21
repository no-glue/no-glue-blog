<?php

namespace application;

use application\classes;

class BlogAdmin{
	public function __construct(){
		require_once('models/ModelFactory.php');
		if(!\application\models\ModelFactory::create('UserDao')
			->getSession()->currentUserCan('can_access_admin')){

			\application\classes\Factory::create('Redirect')
				->redirect('blog_admin_index','index');
		}
	}
}
