<?php

namespace blog;

class BlogAdminHelper{
	protected $think;

	protected $act;

	protected $handler;

	protected $who=array(
		'BlogAdminIndex'=>array(
			'handler'=>array(
				'factory'=>'\\blog\\handlers\\Factory',
				'handler'=>'BlogHandler'
			),
			'think'=>array(
				'factory'=>'\\blog\\think\\Factory',
				'think'=>'BlogAdminThink',
				'think_child'=>'BlogAdminThinkIndex'
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
	}
}
