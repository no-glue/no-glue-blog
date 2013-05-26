<?php

namespace application\classes;

class View{
	public static function load($view,
	$for,
	$additionalValues=array(),
	$valuesLocation='application/values/',
	$viewsLocation='application/views/'){
		$values=require_once($valuesLocation.$view);
		$forValues=require_once($valuesLocation.$for);

		$values['subviews']=
			array_merge($values['subviews'],$forValues);

		!empty($additionalValues) AND $values=array_merge($values,$additionalValues);

		require_once('ClassFactory.php');

		require_once($viewsLocation.$view);
	}
}
