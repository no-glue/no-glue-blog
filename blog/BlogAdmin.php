<?php

namespace blog;

class BlogAdmin{
	protected $think;

	protected $act;

	protected $handler;

	protected $child;

	protected $children=array(
		'BlogAdminIndex'=>array(
			'class'=>'BlogAdminIndex',
			'think'=>array(
				'\\blog\\think\\Factory',
				'BlogThink',
				'BlogAdminIndexThink'
			),
			'act'=>array(
				'\\blog\\act\\Factory',
				'BlogAdminIndexAct'
			)
		)
	);

	public function __construct(
		$child,
		$childFactory='\\blog\\Factory'
	){
		$this->child=$childFactory::create($child);
	}

	public function setChild($child){
		$this->child=$child;

		return $this;
	}

	public function getChild(){
		return $this->child;
	}

	public function setChildren($children){
		$this->children=$children;

		return $this;
	}

	public function getChildren(){
		return $this->children;
	}

	public function addChildren($children){
		$this->children=array_merge($this->children,$children);

		return $this;
	}

	public function __call($method,$arguments){
		$object=$this;

		if(method_exists($this->child,$method)){
			$object=$this->child;
			
			$setup=$this->children[array_pop($arguments)];

			foreach($setup as $item=>$pieces){
				$object->$item=array_pop($pieces)
					::create(array_pop($pieces))
					->setChild(array_pop($pieces));
			}
		}

		return call_user_func_array(array($object,$method),$arguments);
	}
}
