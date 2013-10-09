<?php

namespace blog;

class BlogAdminPosts{
	protected $think;

	protected $act;

	public function __construct(
		$think='BlogThink',
		$act='BlogAct',
		$thinkFactory='\\blog\\think\\Factory',
		$actFactory='\\blog\\act\\Factory'
	){
		$this->think=$thinkFactory::create(
			$think
		);

		$this->act=$actFactory::create(
			$act
		);

		$this->think->trip('canAccessAdmin') AND
		$this->act->redirect('blog_admin_index','index');
	}

	public function index(
		$requestType,
		$requestObject
	){
		$this->think->trip(
			'isPost',
			$requestType
		) AND
		$this->act->deletePostById(
			$requestObject->id
		);

		$this->act->show(
			'blog_admin_template.php',
			'blog_admin_posts_index.php',
			array('posts'=>$this->act->getPosts())
		);
	}

	public function view(
		$requestType,
		$requestObject
	){
		$this->think->trip(
			'isPost',
			$requestType
		) AND
		$this->act->updatePost(
			$requestObject
		);

		$post=$this->act->getPost(
			$requestObject->id
		);

		$this->act->show(
			'blog_admin_template.php',
			'blog_admin_posts_view.php',
			array(
				'post'=>$post
			)
		);
	}

	public function add(
		$requestType,
		$requestObject
	){
		$this->think->trip(
			'isPost',
			$requestType
		) AND
		$this->act->addPost(
			$requestObject
		);

		$this->act->show(
			'blog_admin_template.php',
			'blog_admin_posts_add.php'
		);
	}
}

return new \blog\BlogAdminPosts();
