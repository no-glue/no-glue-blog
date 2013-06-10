<?php

namespace application\classes;

class Session{
	protected $_actual;

	public function __construct(
		$actual=array(
			'object'=>'SessionFile',
			'factory_file'=>'ClassFactory.php',
			'factory'=>'\\application\\classes\\ClassFactory'
		)
	){
		require_once($actual['factory_file']);

		$this->_actual=$actual['factory']::create($actual['object']);
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
