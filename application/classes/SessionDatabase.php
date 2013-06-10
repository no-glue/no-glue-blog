<?php

namespace application\classes;

use premade;

class SessionDatabase implements SessionHandlerInterface{
	protected $_databaseWrapper;

	public function __construct($databaseWrapper=array(
		'factory_file'=>'premade/DatabaseWrapperFactory.php',
		'factory'=>'\\premade\\DatabaseWrapperFactory',
		'object'=>'\\premade\\PdoDatabaseWrapper'
	)){
		require_once($databaseWrapper['factory_file']);

		$this->_databaseWrapper=
			$databaseWrapper['factory']::create(
				$databaseWrapper['object']
			);

		session_set_save_handler($this,TRUE);

		session_start();
	}

	protected function _execute($sql,$values=array()){
		$statement=$this->_databaseWrapper->execute($sql,$values);

		return $statement;
	}

	public function open($savePath,$sessionName){}

	public function close(){
		return TRUE;
	}

	public function read(
		$id,
		$sql='SELECT * FROM sessions WHERE id=:id'
	){
		$values=array(
			':id'=>$id
		);

		$statement=$this->_execute($sql,$values);
	}

	public function write($id,$data){}

	public function destroy($id){}

	public function gc($maxlifetime){}
}
