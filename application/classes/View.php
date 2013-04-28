<?php

namespace application\classes;

class View{
	public static function load($view,
	$for,
	$additionalValues=array(),
	$valuesLocation='application/values/',
	$requiresLocation='application/requires/',
	$viewsLocation='application/views/'){
		$values=require_once($valuesLocation.$for);

		!empty($additionalValues) AND $values=array_merge($values,$additionalValues);

		$requires=require_once($requiresLocation.$for);

		foreach($requires as $require){
			require_once($require);
		}

		require_once($viewsLocation.$view);
	}
}
