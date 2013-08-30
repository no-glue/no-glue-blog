<?php

namespace blog\think;

class BlogThink{
	protected $child;

	public function __construct($child=NULL){
		$this->child=$child;
	}

	public function setChild($child){
		$this->child=$child;
		
		return $this;
	}

	public function getChild(){
		return $this->child;
	}

	public function canAccessAdmin(
		$user='UserDao',
		$currentUserCan='can_access_admin',
		$daoFactory='\\blog\\models\\Factory'
		
	){
		$result=NULL;

		$user=$daoFactory::create($user) AND
		$user->getSession()->currentUserCan($currentUserCan) AND
		$result=$this;

		return $result;
	}

	public function __call($method,$arguments){
		$object=(method_exists($this->child,$method))?
			$this->child:$this;

		return call_user_func_array(array($object,$method),$arguments);
	}
}
