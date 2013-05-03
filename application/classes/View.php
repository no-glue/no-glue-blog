<?php

namespace application\classes;

class View{
	public static function load($view,
	$for,
	$additionalValues=array(),
	$valuesLocation='application/values/',
	$viewsLocation='application/views/'){
		$values=require_once($valuesLocation.$for);

		!empty($additionalValues) AND $values=array_merge($values,$additionalValues);

		require_once('HelperFactory.php');

		require_once($viewsLocation.$view);
	}
}
