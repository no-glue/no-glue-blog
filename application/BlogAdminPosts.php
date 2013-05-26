<?php

namespace application;

use premade;
use application\classes;
use application\models;

class BlogAdminPosts{
	public function __construct(){}

	public function index($requestType,$requestObject){
		require_once('premade/Constants.php');
		require_once('classes/ClassFactory.php');
		require_once('models/DaoFactory.php');
		require_once('models/ModelFactory.php');

		$postDao=\application\models\DaoFactory::create('PostDao');

		$requestType===\premade\Constants::REQUEST_POST AND
		\application\models\ModelFactory::create('PostValidate')
			->validateDelete($requestObject) AND
		$postDao->deletePostById($requestObject->id);

		$posts=\application\classes\ClassFactory::create('Result')
			->setStatement($postDao->getPosts())
			->setWhatVo('PostVo');

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_index.php',
			array('posts'=>$posts)
		);
	}

	public function view($requestType,$requestObject){
		require_once('premade/Constants.php');
		require_once('classes/ClassFactory.php');
		require_once('models/DaoFactory.php');
		require_once('models/VoFactory.php');
		require_once('models/ModelFactory.php');

		$requestType===\premade\Constants::REQUEST_POST AND
		\application\models\ModelFactory::create('PostValidate')
			->validateUpdate($requestObject) AND
		\application\models\DaoFactory::create('PostDao')
			->update(
				\application\models\VoFactory::create(
					'PostVo'
				)
				->setFromObject($requestObject)
			);

		$post=\application\classes\ClassFactory::create('Result')
			->setStatement(
				\application\models\DaoFactory::create(
					'PostDao'
				)
				->getPostById($requestObject->id)
			)
			->setWhatVo('PostVo')
			->fetch();

		require_once('classes/View.php');

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_view.php',
			array('post'=>$post)
		);
	}

	public function add($requestType,$requestObject){
		require_once('classes/View.php');
		require_once('premade/Constants.php');
		require_once('models/DaoFactory.php');
		require_once('models/VoFactory.php');

		$requestType===\premade\Constants::REQUEST_POST AND
		\application\models\DaoFactory::create('PostDao')->save(
			\application\models\VoFactory::create('PostVo')
				->setFromObject($requestObject)
		);

		\application\classes\View::load('blog_admin_template.php',
			'blog_admin_posts_add.php',
			array('post'=>$post)
		);
	}
}

return new \application\BlogAdminPosts();
