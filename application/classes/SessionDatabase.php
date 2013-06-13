<?php

namespace application\classes;

use premade;

class SessionDatabase implements \SessionHandlerInterface{
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

		$row=$this->_databaseWrapper->fetch($statement);

		return $row['body'];
	}

	public function write(
		$id,
		$body,
		$sql='REPLACE sessions (id,body,created_at,modified_at) VALUES (:id,:body,UNIX_TIMESTAMP(),UNIX_TIMESTAMP())'){
		$values=array(
			':id'=>$id,
			':body'=>$body
		);

		$statement=$this->_execute($sql,$values);

		return $statement->rowCount();
	}

	public function destroy(
	$id,
	$sql='DELETE FROM sessions WHERE id=:id'
	){
		$values=array(
			':id'=>$id
		);

		$statement=$this->_execute($sql,$values);

		return $statement->rowCount();
	}

	public function gc($maxlifetime){}

	public function login($userLevel){
		require_once('ConfigureLoader.php');

		$accessRights=ConfigureLoader::help('configure/','accessRights.php');
		session_start();

		$_SESSION['access_rights']=
			array_slice($accessRights,$userLevel);

		session_regenerate_id();
	}

	public function logout(){
		session_start();

		unset($_SESSION['access_rights']);

		return TRUE;
	}

	public function currentUserCan($right){
		session_start();

		return isset($_SESSION['access_rights']) AND
			in_array($right,$_SESSION['access_rights']);
	}
}
