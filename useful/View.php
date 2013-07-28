<?php

namespace useful;

class View{
	public static function load($view,
	$for,
	$additionalValues=array(),
	$valuesLocation='blog/values/',
	$viewsLocation='blog/views/'){
		$values=require_once($valuesLocation.$view);
		$forValues=require_once($valuesLocation.$for);

		$values['subviews']=
			array_merge($values['subviews'],$forValues);

		!empty($additionalValues) AND $values=array_merge($values,$additionalValues);

		require_once('Factory.php');

		require_once($viewsLocation.$view);
	}
}
