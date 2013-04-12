<?php

namespace application\classes;

class View{
	public static function load($view,
	$valuesLocation='application/values/',
	$requiresLocation='application/requires/',
	$viewsLocation='application/views/'){
		$values=require_once($valuesLocation.$view);

		$requires=require_once($requiresLocation.$view);

		foreach($requires as $require){
			require_once($require);
		}

		require_once($viewsLocation.$view);
	}
}
