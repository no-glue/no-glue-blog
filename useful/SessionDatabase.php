<?php

namespace useful;

class SessionDatabase implements \SessionHandlerInterface{
	protected $_databaseWrapper;

	public function __construct(
		$databaseWrapper='PdoDatabaseWrapper',
		$factory='\\premade\\Factory'
	){
		$this->_databaseWrapper=
			$factory::create(
				$databaseWrapper
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

	public function login(
		$userLevel,
		$accessRights=array()
	){
		$accessRights=array_merge(
			\useful\Statics::$accessRights,
			$accessRights
		);

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
