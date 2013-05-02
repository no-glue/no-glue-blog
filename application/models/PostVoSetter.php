<?php

namespace application\models;

class PostVoSetter{
	public function set($object,$values){
		$object->setId($values['id']);
		$object->setName($values['name']);
		$object->setTitle($values['title']);
		$object->setBody($values['body']);
		$object->setCreated($values['created']);
		$object->setModified($values['modified']);

		return object;
	}
}
		
