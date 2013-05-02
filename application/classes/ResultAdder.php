<?php

namespace application\classes;

class ResultAdder{
	public static function add($object,$statement,$whatVo){
		$object->setStatement($statement);
		$object->setWhatVo($whatVo);
		
		return $object;
	}
}
