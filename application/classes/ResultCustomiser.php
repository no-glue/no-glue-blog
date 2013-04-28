<?php

namespace application\classes;

class ResultCustomiser{
	public function customise($object,$databaseWrapper,$statement,$whatVo){
		$object->set($databaseWrapper,$statement,$whatVo);

		return $object;
	}
}
