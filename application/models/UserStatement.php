<?php

namespace application\models;

class UserStatement{
	public function getUsers(){
		return 'SELECT * FROM users ORDER BY id DESC';
	}

	public function getUserById(){
		return 'SELECT * FROM users WHERE id=%d';
	}

	public function login(){
		return 'SELECT id,level FROM users WHERE '.
			'username=:username AND password=:password';
	}

	public function save(){
		return 'INSERT INTO users '.
			'(username,password,level,created_at,modified_at) '.
			'VALUES '.
			'(:username,:password,:level,:created_at,'.
			':modified_at)';
	}

	public function deleteUserById(){
		return 'DELETE FROM users WHERE id=:id';
	}

	public function update($userVo){
		$sql='UPDATE users SET username=:username,'.
			'<password=:password,>level=:level,'.
			'modified_at=UNIX_TIMESTAMP() WHERE id=:id';

		if($userVo->getPassword()!==''){
			$sql=str_replace('<password=:password,>','password=:password,',$sql);
		}else{
			$sql=str_replace('<password=:password,>','',$sql);
		}

		return $sql;
	}
}
