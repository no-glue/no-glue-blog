<?php

namespace application\classes;

class Session{
	protected $_actual;

	public function __construct(
		$actual=array(
			'factory_file'=>'SessionFactory.php',
			'factory'=>'\\application\\classes\\SessionFactory'
		)
	){
		require_once($actual['factory_file']);

		$this->_actual=$actual['factory']::create();
	}

	public function login($userLevel){
		$this->_actual->login($userLevel);
	}

	public function logout(){
		return $this->_actual->logout();
	}

	public function currentUserCan($right){
		return $this->_actual->currentUserCan($right);
	}
}
