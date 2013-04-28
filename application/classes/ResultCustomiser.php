<?php

namespace application\classes;

use premade;

class ResultCustomiser{
	public function customise($statement,$whatVo,$objectName='Result'){
		require_once('ResultFactory.php');

		$object=\application\classes\ResultFactory::create($objectName);

		require_once('premade/DatabaseWrapperFactory.php');

		$object->set(\premade\DatabaseWrapperFactory::create(),$statement,$whatVo);

		return $object;
	}
}
