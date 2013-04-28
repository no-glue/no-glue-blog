<?php

namespace application\classes;

class ResultCustomiser{
	public function customise($databaseWrapper,$statement,$whatVo,$objectName='Result'){
		require_once('ResultFactory.php');

		$object=\application\classes\ResultFactory::create($objectName);

		$object->set($databaseWrapper,$statement,$whatVo);

		return $object;
	}
}
