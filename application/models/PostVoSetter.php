<?php

namespace application\models;

class PostVoSetter{
	public function set($object,$values){
		$object->setId($values['id']);
		$object->setName($values['name']);
		$object->setTitle($values['title']);
		$object->setBody($values['body']);
		$object->setCreatedAt($values['created_at']);
		$object->setModifiedAt($values['modified_at']);

		return object;
	}
}
		
