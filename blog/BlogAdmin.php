<?php

namespace blog;

class BlogAdmin{
	protected $think;

	protected $act;

	protected $handler;

	protected $child;

	protected $children=array(
		'BlogAdminIndex'=>array(
			'handler'=>array(
				'\\blog\\handlers\\Factory'
				'BlogHandler',
			),
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
		$child='',
		$childFactory='\\blog\\Factory'
	){
		isset($this->children[$child]) AND
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
			
			$setup=$this->children[array_shift($arguments)];

			$handler=array_shift($setup);

			$this->handler=array_shift($handler)
				::create(array_shift($handler));

			while(($item=array_shift($setup)) && $item){
				$object->$item=array_shift($item)
					::create(array_shift($item))
					->setChild(array_shift($item));
			}
		}

		return call_user_func_array(array($object,$method),$arguments);
	}
}

return new \blog\BlogAdmin();
