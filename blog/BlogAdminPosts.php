<?php

namespace blog;

class BlogAdminPosts{
	protected $think;

	protected $act;

	public function __construct(
		$think='BlogThink',
		$act='BlogAct',
		$exceptionHandler='handle',
		$thinkFactory='\\blog\\think\\Factory',
		$actFactory='\\blog\\act\\Factory'
	){
		$this->think=$thinkFactory::create($think);

		$this->act=$actFactory::create($act);

		set_exception_handler(array($this,$exceptionHandler));
	}

	public function index($requestType,$requestObject){
		$this->think->isPost($requestType) AND
		$this->act->deletePostById($requestObject->id);
	}

	public function view($requestType,$requestObject){
		$requestType===\premade\Constants::REQUEST_POST AND
		\blog\models\Factory::create('PostDao')
			->update(
				\blog\models\Factory::create(
					'PostVo'
				)
				->setFromObject($requestObject)
			);

		$post=\useful\Factory::create('Result')
			->setStatement(
				\blog\models\Factory::create(
					'PostDao'
				)
				->getPostById($requestObject->id)
			)
			->setWhatVo('PostVo')
			->fetch();

		\useful\View::load('blog_admin_template.php',
			'blog_admin_posts_view.php',
			array('post'=>$post)
		);
	}

	public function add($requestType,$requestObject){
		$requestType===\premade\Constants::REQUEST_POST AND
		\blog\models\Factory::create('PostDao')->save(
			\blog\models\Factory::create('PostVo')
				->setFromObject($requestObject)
		);

		\useful\View::load('blog_admin_template.php',
			'blog_admin_posts_add.php'
		);
	}

	public function handle($exception){
		$this->act->show(
			'blog_admin_template.php',
			'blog_admin_posts_index.php',
			array(
				'posts'=>$this->act->getPosts()
			)
		);
	}
}

return new \blog\BlogAdminPosts();
