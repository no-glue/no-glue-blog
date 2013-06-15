<?php

namespace application\models;

class PostStatement{
	public function getPosts(){
		return 'SELECT * FROM posts ORDER BY id DESC';
	}

	public function getPostById(){
		return 'SELECT * FROM posts WHERE id=:id';
	}

	public function save(){
		return 'INSERT INTO posts '.
			'(name,title,body,created_at,modified_at) VALUES '.
			'(:name,:title,:body,:created_at,:modified_at)';
	}

	public function deletePostById(){
		return 'DELETE FROM posts WHERE id=:id';
	}

	public function update(){
		return 'UPDATE posts SET '.
			'name=:name,title=:title,body=:body,'.
			'modified_at=UNIX_TIMESTAMP() WHERE id=:id';
	}
}
