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

		$this->think->canAccessAdmin('canAccessAdminConstruct');
	}

	public function index($requestType,$requestObject){
		$this->think->isPost($requestType,'isPostIndex') AND
		$this->act->deletePostById($requestObject->id);
	}

	public function view($requestType,$requestObject){
		$this->think->isPost($requestType,'isPostView') AND
		$this->act->updatePost($requestObject);

		$post=$this->act->getPost($requestObject->id);

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
		switch($exception->getMessage()){
			case 'isPostIndex':
				$this->act->show(
				'blog_admin_template.php',
				'blog_admin_posts_index.php',
					array(
						'posts'=>
							$this->act
								->getPosts()
					)
				);
				break;

			case 'canAccessAdminConstruct':
				$this->act->redirect(
					'blog_admin_index',
					'index'
				);
				break;

			case 'isPostView':break;
		}
	}
}

return new \blog\BlogAdminPosts();
