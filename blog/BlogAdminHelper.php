<?php

namespace blog;

class BlogAdminHelper{
	protected $think;

	protected $act;

	protected $handler;

	protected $who=array(
		'blog\\BlogAdminIndex'=>array(
			'handler'=>array(
				'factory'=>'\\blog\\handlers\\Factory',
				'handler'=>'BlogHandler'
			),
			'think'=>array(
				'factory'=>'\\blog\\think\\Factory',
				'think'=>'BlogThink',
				'think_child'=>'BlogAdminIndexThink'
			),
			'act'=>array(
				'factory'=>'\\blog\\act\\Factory',
				'act'=>'BlogAdminIndexAct'
			)
		)
	);

	public function __construct(){}

	public function setup(
		$who,
		$setChild='setChild'
	){
		foreach($this->who[$who] as $item=>$pieces){
			$factory=array_shift($pieces);

			$piece=array_shift($pieces);

			$this->{$item}=
				$factory::create(
					$piece
				);

			$child=array_shift($pieces) AND
			$this->{$item}->{$setChild}(
				$factory::create($child)
			);
		}

		return $this;
	}

	public function __get($name){
		return $this->{$name};
	}
}
