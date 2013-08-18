<?php

namespace useful;

class View{
	public static function load(
	$view,
	$for,
	$additionalValues=array(),
	$valuesLocation='blog/values/',
	$viewsLocation='blog/views/',
	$cache='\\useful\\Cache'
	){
		$values=require_once($valuesLocation.$view);
		$forValues=require_once($valuesLocation.$for);

		$values['subviews']=
			array_merge($values['subviews'],$forValues);

		!empty($additionalValues) AND $values=array_merge($values,$additionalValues);

		$view=$cache::cache($view,$for,$values,$viewsLocation);

		require_once($view);
	}
}
